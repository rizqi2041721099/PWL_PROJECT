<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;
use DataTables;
use Auth;

class PenerbitController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:penerbit-list|penerbit-create|penerbit-edit|penerbit-delete', ['only' => ['index','store']]);
         $this->middleware('permission:penerbit-create', ['only' => ['create','store']]);
         $this->middleware('permission:penerbit-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:penerbit-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $page = 'master';
        $data = Penerbit::latest()->get();
        return view('pages.penerbit.index', compact('data','page'));
    }


    public function create()
    {
        $page = 'master';
        return view('pages.penerbit.create',compact('page'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:penerbits,name|string|max:30|min:4'
        ]);

        $data = $request->all();
        $penerbit = Penerbit::create($data);

        return redirect()->route('penerbit.index')->with('success', 'Penerbit Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $page = 'master';
        $data = Penerbit::findOrFail($id);

        return view('pages.penerbit.edit', compact('data','page'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|unique:penerbits,name|min:4|max:30,'.$id,
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $data     = $request->all();
        $penerbit->update($data);

        return redirect()->route('penerbit.index')->with('success', 'Penerbit Berhasil Diupdate');
    }


    public function destroy($id)
    {
        $data = Penerbit::findOrFail($id)->delete();
        return back()->with('delete','Delete Data Penerbit  Berhasil');
    }
}
