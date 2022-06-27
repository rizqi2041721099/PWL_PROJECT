<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:pengembalian-list|pengembalian-create|pengembalian-edit|pengembalian-delete', ['only' => ['index','store']]);
         $this->middleware('permission:pengembalian-create', ['only' => ['create','store']]);
         $this->middleware('permission:pengembalian-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pengembalian-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $page = 'transaction';
        $data = Peminjaman::join('books','books.id','peminjaman.book_id')
                            ->join('users','users.id','peminjaman.user_id')
                            ->select('peminjaman.*','books.sampul as book','books.judul','users.name')
                            ->where('status',2)
                            ->latest()
                            ->get();
        // dd($data);
        return view('pages.pengembalian.index',compact('data','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }
}
