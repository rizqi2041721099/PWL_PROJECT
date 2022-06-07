<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    
    public function index()
    {
        $data = Penerbit::all();

        return view('pages.penerbit.index', compact('data'));
    }

  
    public function create()
    {
        return view('pages.penerbit.create');
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
        $data = Penerbit::findOrFail($id);

        return view('pages.penerbit.edit', compact('data'));
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
        return redirect()->route('penerbit.index')->with('delete','Delete Data Penerbit  Berhasil');
    }
}
