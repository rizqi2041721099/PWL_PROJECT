<?php

namespace App\Http\Controllers;

use App\Models\{Rak,Book};
use Illuminate\Http\Request;

class RakController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:raks-list|raks-create|raks-edit|raks-delete', ['only' => ['index','store']]);
         $this->middleware('permission:raks-create', ['only' => ['create','store']]);
         $this->middleware('permission:raks-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:raks-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $page = 'master';
        $data = Rak::join('books','books.id','raks.book_id')
                    ->latest()
                    ->get(['raks.*','books.judul']);
        return view('pages.rak.index', compact('data','page'));
    }

    public function create()
    {
        $page = 'mater';
        $book = Book::all();
        return view('pages.rak.create',compact('book','page'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'book_id'   => 'required',
            'name'      => 'required|string|min:5|max:20|unique:raks,name'
        ]);

        $data = $request->all();
        $raks = Rak::create($data);

        return redirect()->route('raks.index')->with('success', "Data $raks->name Berhasil Ditambahkan");
    }


    public function show(Rak $rak)
    {

    }


    public function edit($id)
    {
        $page = 'master';
        $book = Book::all();
        $data = Rak::findOrFail($id);
        return view('pages.rak.edit',compact('data','book','page'));
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

        return redirect()->route('raks.index')->with('success', "Data Rak $raks->name Berhasil Update");
    }


    public function destroy($id)
    {
        $data = Rak::findOrFail($id);
        $books = Book::findOrFail($data->book_id);
        // dd($books->stock);
        if ($books->stock == 0) {
            $data->delete();
            return back()->with('success', 'Rak Berhasil Dihapus');
        } else {
            return back()->with('danger', 'Stok buku masih ada!');
        }
    }
}
