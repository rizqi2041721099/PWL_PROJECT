<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
<<<<<<< HEAD

    public function index()
    {
       $data = Rak::all();

       return view('pages.rak.index', compact('data'));
    }


    public function create()
    {
        return view('pages.rak.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|unique:raks,name|max:20'
        ]);

        $data = $request->all();
        $raks   = Rak::create($data);

        return redirect()->route('raks.index')->with('success','Rak Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Rak::findOrFail($id);
        return view('pages.rak.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|unique:raks,name,'.$id,
        ]);

        $raks = Rak::findOrFail($id);
        $data     = $request->all();
        $raks->update($data);

        return redirect()->route('raks.index')->with('success','Rak Berhasil Diupdate');
    }


    public function destroy(Rak $rak)
    {
        $rak->delete();
        return redirect()->route('raks.index')->with('success','Rak Berhasil Dihapus');
=======
 
    public function index()
    {
        $data = Rak::join('books','books.id','raks.book_id')
                    ->get(['books.*','books.judul']);
                    
        return view('pages.rak.index', compact('data'));
    }

    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show(Rak $rak)
    {
        
    }

  
    public function edit(Rak $rak)
    {
        
    }

    public function update(Request $request, Rak $rak)
    {
        
    }

    
    public function destroy(Rak $rak)
    {
        
>>>>>>> 1b4f1ac5a01036be050dffcf08ef9c126ecad0e5
    }
}
