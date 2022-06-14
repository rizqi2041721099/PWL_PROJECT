<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,Penerbit,Peminjaman};

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $page = 'home';
        $books     = Book::count();
        $peminjaman  = Peminjaman::count();
        $penerbit   = Penerbit::count();
        return view('pages.home.index', compact('books','peminjaman','penerbit','page'));
    }
}
