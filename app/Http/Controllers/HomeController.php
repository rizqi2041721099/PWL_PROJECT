<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,Penerbit,Peminjaman};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books     = Book::count();
        $peminjaman  = Peminjaman::count();
        $penerbit   = Penerbit::count();
        return view('pages.home.index', compact('books','peminjaman','penerbit'));
    }
}
