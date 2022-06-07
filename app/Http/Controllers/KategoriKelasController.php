<?php

namespace App\Http\Controllers;

use App\Models\KategoriKelas;
use Illuminate\Http\Request;

class KategoriKelasController extends Controller
{

    public function index()
    {
        $data = KategoriKelas::all();
        // dd($data);
        return view('pages.kelas-kategori.index',compact('data'));
    }

    public function create()
    {
        return view('pages.kelas-kategori.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category'          => 'required|string|unique:kategori_kelas,category|max:1'
        ]);

        $validateData['category'] = strtoupper($validateData['category']);
        $kategori_kelas   = KategoriKelas::create($validateData);

        return redirect()->route('kategori-kelas.index')->with('success','Kategori Kelas Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $data = KategoriKelas::findOrFail($id)->delete();
        return redirect()->route('kategori-kelas.index')->with('delete','Delete Data Kategori Kelas Berhasil');
    }
}
