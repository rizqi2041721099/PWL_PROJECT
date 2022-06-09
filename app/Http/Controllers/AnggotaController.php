<?php

namespace App\Http\Controllers;

use App\Models\{Anggota,Kelas,KategoriKelas};
use Illuminate\Http\Request;

class AnggotaController extends Controller
{

    public function index()
    {
        $page = 'master';
        $data = Anggota::all();
        return view('pages.anggota.index',compact('data','page'));
    }

    public function create()
    {
        $page = 'master';
        $kelas = Kelas::all();
        $ketegori = KategoriKelas::all();
        return view('pages.anggota.create',compact('kelas','ketegori','page'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kelas_id'  => 'required',
            'kategori_id' => 'required',
            'name'      => 'required|unique:anggotas,name|max:30|min:4',
            'telephone' => 'required|unique:anggotas,telephone|max:12',
            'alamat'    => 'required',
        ]);

        $data = $request->all();
        $anggota = Anggota::create($data);

        return redirect()->route('anggotas.index')->with('success','Anggota Berhasil Ditambahkan');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $page       = 'master';
        $kelas      = Kelas::all();
        $ketegori   = KategoriKelas::all();
        $data       = Anggota::findOrFail($id);

        return view('pages.anggota.edit',compact('kelas','ketegori','data','page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id'      => 'required',
            'kategori_id'   => 'required',
            'name'          => 'required|max:30|min:4,'.$id,
            'telephone'     => 'required|unique:anggotas,telephone,'.$id,
            'alamat'        => 'required',
        ]);

        $anggota = Anggota::findOrFail($id);
        $data = $request->all();
        $anggota->update($data);

        return redirect()->route('anggotas.index')->with('success','Anggota Berhasil Diupdate');
    }


    public function destroy($id)
    {
        $data = Anggota::findOrfail($id)->delete();
        return back()->with('delete','Anggota Berhasil Dihapus');
    }
}
