<?php

namespace App\Http\Controllers;

use App\Models\{Book,Penerbit};
use Illuminate\Http\Request;
use DB;
use Image;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index()
    {
        $page = 'master';
        $data = Book::join('penerbits','penerbits.id','books.penerbit_id')
                        ->get(['books.*','penerbits.name as penerbit']);
        return view('pages.books.index',compact('data','page'));
    }

    public function create()
    {
        $page = 'master';
        $penerbit = Penerbit::all();
        return view('pages.books.create',compact('penerbit','page'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'penerbit_id'   => 'required',
            'sampul'        => 'image|mimes:jpeg,png,jpg,svg|max:2048|nullable',
            'judul'         => 'required|unique:books,judul|min:4|max:20',
            'penulis'       => 'required',
            'tahun_terbit'  => 'required',
            'stock'         => 'required'
        ]);

        $data = $request->all();

        $photo = $request->file('sampul');
        if($request->file('sampul')){
            $file = $request->file('sampul');
            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200);
            $file->storeAs('public/images/books/', $file_name);
            $data['sampul'] = $file_name;
        }

        $books = Book::create($data);

        return redirect()->route('books.index')->with('success', "Data $books->judul berhasil ditambahkan");
    }


    public function show(Book $book)
    {

    }


    public function edit($id)
    {
        $page = 'master';
        $penerbits = Penerbit::all();
        $datas     = Book::findOrFail($id);
        return view('pages.books.edit',compact('page','penerbits','datas'));
    }


    public function update(Request $request, Book $book)
    {
        $request->validate([
            'penerbit_id'   => 'required',
            'sampul'        => 'image|mimes:jpeg,png,jpg,svg|max:2048|nullable',
            'judul'         => 'required|unique:books,judul,'.$book->id,
            'penulis'       => 'required',
            'tahun_terbit'  => 'required',
            'stock'         => 'required',
        ]);

        $data = $request->all();

        if($request->hasFile('sampul')){
            $file = $request->file('sampul');
            Storage::delete('public/images/books/'.$book->sampul);

            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200);
            $file->storeAs('public/images/books/', $file_name);
            $data['sampul'] = $file_name;
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', "Data $book->judul berhasil diupdate");
    }


    public function destroy($id)
    {
        $data = Book::findOrFail($id);
        if($data->stock == 0) {
            Storage::delete('public/images/books/'.$data->sampul);
            $data->delete();
            return back()->with('delete',"Data Buku berhasil dihapus");
        }
        else {
            return back()->with('warning', "Buku tidak bisa dihapus karena stok masih ada!");
        }
    }
}
