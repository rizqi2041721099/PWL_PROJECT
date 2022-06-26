<?php

namespace App\Http\Controllers;

use App\Models\{Book,Penerbit};
use Illuminate\Http\Request;
use DB;
use Image;
use Illuminate\Support\Facades\Storage;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:book-list|book-create|book-edit|book-delete', ['only' => ['index','store']]);
         $this->middleware('permission:book-create', ['only' => ['create','store']]);
         $this->middleware('permission:book-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:book-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if(Auth::user()->hasRole('ADMIN')){
            $data = Book::join('penerbits','penerbits.id','books.penerbit_id')
                        ->latest()->get(['books.*','penerbits.name as penerbit']);
        }

        $page = 'master';
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
            'stock'         => 'required',
            'harga'         => 'required'
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

        $books = Book::create([
            'penerbit_id'   => $data['penerbit_id'],
            'sampul'        => $data['sampul'],
            'judul'         => $data['judul'],
            'penulis'       => $data['penulis'],
            'tahun_terbit'  => $data['tahun_terbit'],
            'stock'         => $data['stock'],
            'harga'         => (int)str_replace(',','',$data['harga']),
        ]);

        return redirect()->route('books.index')->with('success', "Data $books->judul berhasil ditambahkan");
    }


    public function show($id)
    {
        // $page = 'master';
        // $data = Book::findOrFail($id);
        // return view('pages.books.show',compact('data','page'));
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
            'harga'         => 'required'
        ]);

        $data = $request->all();
        // dd($data);
        if($request->hasFile('sampul')){
            $file = $request->file('sampul');
            Storage::delete('public/images/books/'.$book->sampul);

            $file_name = time() . str_replace(" ", "", $file->getClientOriginalName());
            $imageFile = Image::make($file->getRealPath());
            $imageFile->resize(1200,1200);
            $file->storeAs('public/images/books/', $file_name);
            $data['sampul'] = $file_name;
        }

        $book->update([
            'penerbit_id'   => $data['penerbit_id'],
            'sampul'        => $request->sampul ? $data['sampul'] : $book->sampul,
            'judul'         => $data['judul'],
            'penulis'       => $data['penulis'],
            'tahun_terbit'  => $data['tahun_terbit'],
            'stock'         => $data['stock'],
            'harga'         => (int)str_replace(',','',$data['harga']),
        ]);

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

    public function exportPDF()
    {
        $page = 'master';
        $data = Book::join('penerbits','penerbits.id','books.penerbit_id')
                    ->get(['books.*','penerbits.name as penerbit']);
                    // dd($data);
        $pdf = PDF::loadview('pages.books.book_pdf',compact('data','page'));

        return $pdf->stream('book.pdf');
    }
}
