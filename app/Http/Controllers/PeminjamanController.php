<?php

namespace App\Http\Controllers;

use App\Models\{Peminjaman,Book,User};
use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:peminjaman-list|peminjaman-create|peminjaman-edit|peminjaman-delete', ['only' => ['index','store']]);
         $this->middleware('permission:peminjaman-create', ['only' => ['create','store']]);
         $this->middleware('permission:peminjaman-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:peminjaman-delete', ['only' => ['destroy']]);
    }

    public function index()
    {

        if(Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('PETUGAS')){
            $data = Peminjaman::join('books','books.id','peminjaman.book_id')
                                ->join('users','users.id','peminjaman.user_id')
                                ->select('peminjaman.*','books.judul as book','users.name as user')->latest()->get()->paginate(10);
        }
        else{
            $data = Peminjaman::join('books','books.id','peminjaman.book_id')
            ->join('users','users.id','peminjaman.user_id')
            ->where('user_id',Auth::user()->id)
            ->select('peminjaman.*','books.judul as book','users.name as user','user_id')->get();
        }

        $page = 'transactions';
        return view('pages.peminjaman.index',compact('page','data'));
    }


    public function create()
    {
        $page = 'transaction';
        $books = Book::all();
        $users = User::whereHas('roles',function($query){
            $query->where('name','ANGGOTA');
        })->get();
        return view('pages.peminjaman.create',compact('page','users','books'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id'                => 'required',
            'book_id'                => 'required',
            'stock'                  => 'required',
            'tanggal_pinjam'         => 'required|date',
        ]);

        $data = $request->all();
        $books = Book::where('id',$request->book_id)->first();

        if ($books->stock == 0){
            return redirect()->route('peminjaman.create')->with('error','Stok buku kosong!');
        } elseif ( $request->stock > $books->stock){
            return redirect()->route('peminjaman.create')->with('error',"Stok buku tidak cukup hanya tersedia $books->stock!");
        } else  {
            // $books->decrement('stock',1);
            $books->stock =  $books->stock - $request->stock;
            $books->save();
            // dd($books);

            Peminjaman::create([
                'user_id'           => $data['user_id'],
                'book_id'           => $data['book_id'],
                'stock'             => $data['stock'],
                'tanggal_pinjam'    => $data['tanggal_pinjam'],
            ]);
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');

    }

    public function show($id)
    {
        $page = 'transaction';

        $data = Peminjaman::findOrFail($id)->join('books','books.id','peminjaman.book_id')
                                           ->join('users','users.id','peminjaman.user_id')
                                           ->select('peminjaman.*','books.sampul as book','books.judul','users.name')
                                           ->where('peminjaman.id',$id)
                                           ->first();
        // dd($data);
        return view('pages.peminjaman.show',compact('page','data'));
    }


    public function edit($id)
    {
        $page = 'transaction';
        $data = Peminjaman::findOrFail($id);

        return view('pages.peminjaman.edit',compact('page','data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_kembali'                => 'required',
            'tanggal_kembali'               => 'required|date',
        ]);

        $data = $request->all();
        $denda = 0;
        $peminjaman = Peminjaman::findOrFail($id);
        $books = Book::where('id',$peminjaman->book_id)->first();
        // $harga = Book::where('id',$books->harga)->first();
        // dd($harga);
        if($request->jumlah_kembali < $peminjaman->stock){
            $denda = $books->harga * ($peminjaman->stock - $request->jumlah_kembali);
        }
        // dd($denda);
        $peminjaman->update([
            'jumlah_kembali' => $data['jumlah_kembali'],
            'denda' => $denda,
            'status' => 2,
            'tanggal_kembali' => ($data['tanggal_kembali'])
        ]);

        $books->stock = $books->stock + $data['jumlah_kembali'];
        $books->save();

        return redirect()->route('peminjaman.index')->with('success','Peminjaman selesai');
    }

    public function exportPdfPeminjaman()
    {
        $page = 'master';
        if(Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('PETUGAS')){
            $data = Peminjaman::join('books','books.id','peminjaman.book_id')
                                ->join('users','users.id','peminjaman.user_id')
                                ->where('status',1)
                                ->select('peminjaman.*','books.judul as book','users.name as user')->get();
            // dd($data);
        }
                    // dd($data);
        $pdf = PDF::loadview('pages.peminjaman.exportPdf',compact('data','page'));

        return $pdf->stream('peminjaman.pdf');
    }


    public function destroy(Peminjaman $peminjaman)
    {

    }
}
