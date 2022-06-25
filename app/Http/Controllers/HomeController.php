<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,Penerbit,Peminjaman};
use Auth;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->hasRole('ADMIN') || Auth::user()->hasRole('PETUGAS'))
         {
            $books        = Book::count();
            $peminjaman   = Peminjaman::where('status',1)->count();
            $denda        = Peminjaman::select('denda')->where('status',2)->first();
            $pengembalian = Peminjaman::where('status',2)->count();

        } elseif(Auth::user()->hasRole('ANGGOTA')) {
            $books        = Book::count();
            $peminjaman   = Peminjaman::where('user_id',Auth::user()->id)->where('status',1)->count();
            $denda        = Peminjaman::select('denda')
                                        ->where('status',2)
                                        ->where('user_id',Auth::user()->id)
                                        ->first();
            $pengembalian = Peminjaman::where('status',2)->where('user_id',Auth::user()->id)->count();
        }

        $page = 'home';
        return view('pages.home.index', compact('books','peminjaman','page','denda','pengembalian'));
    }
}
