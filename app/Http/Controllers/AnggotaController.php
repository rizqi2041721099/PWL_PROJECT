<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function index()
    {
        $data = Anggota::all();

        return view('pages.anggota.index',compact('data'));
    }

    public function create()
    {
        return view('pages.anggota.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|unique:anggotas,name|max:30|min:4',
            'telephone' => 'required|unique:anggotas,telephone|max:12',
            'alamat'    => 'required'
        ]);

        $data = $request->all();
        $anggota = Anggota::create($data);

        return redirect()->route('anggotas.index')->with('success','Anggota Berhasil Ditambahkan');
    }


    public function show(Anggota $anggota)
    {

    }


    public function edit(Anggota $anggota)
    {

    }

    public function update(Request $request, Anggota $anggota)
    {

    }


    public function destroy(Anggota $anggota)
    {

    }
}
