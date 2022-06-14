<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function index()
    {
       $page = 'users';
       $data = User::orderBy('id','DESC')->paginate(5);
    //    dd($data);
       return view('pages.users.index',compact('page','data'));
    }


    public function create()
    {
        $page = 'users';
        $roles = Role::all();
        return view('pages.users.create',compact('roles','page'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User berhasil ditambahkan');
    }


    public function show($id)
    {
        $page = 'users';
        $data = User::findOrFail($id);

        return view('pages.users.show', compact('page', 'data'));
    }


    public function edit($id)
    {
        $page = 'users';
        $user = User::findOrFail($id);
        $roles = Role::all();
        $userRole = $user->roles->first();

        return view('pages.users.edit',compact('page','user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User berhasil diupdate');
    }


    public function destroy($id)
    {
        $data = User::findOrFail($id)->delete();
        return back()->with('delete', 'User berhasil dihapus');
    }
}
