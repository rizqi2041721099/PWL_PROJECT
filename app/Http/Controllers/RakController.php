<?php

namespace App\Http\Controllers;

use App\Models\{Rak,Book};
use Illuminate\Http\Request;

class RakController extends Controller
{

    public function index()
    {
        $data = Rak::join('books','books.id','raks.book_id')
                    ->get(['books.*','books.judul']);
        return view('pages.rak.index', compact('data'));
    }

    public function create()
    {
        $book = Book::all();
        return view('pages.rak.create',compact('book'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'book_id'   => 'required',
            'name'      => 'required|string|min:5|max:20|unique:raks,name'
        ]);

        $data = $request->all();
        $raks = Rak::create($data);

        return redirect()->route('raks.index')->with('success', 'Rak Berhasil Ditambahkan');
    }


    public function show(Rak $rak)
    {

    }


    public function edit($id)
    {
        $data = Rak::findOrFail($id);

        return view('pages.rak.edit',cmpact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id'   => 'required',
            'name'     => 'required|string|unique:raks,name,'.$id,
        ]);

        $raks = Rak::findOrFail($id);
        $data = $request->all();
        $raks->update($data);

        return redirect()->route('raks.index')->with('success', 'Rak Berhasil Ditambahkan');
    }


    public function destroy($id)
    {
        $data = Rak::findOrFail($id);
        return redirect()->route('raks.index')->with('success', 'Rak Berhasil Dihapus');
    }
}
