<?php

namespace App\Http\Controllers;

use App\Models\{Kelas,KategoriKelas};
use Illuminate\Http\Request;

class KelasController extends Controller
{

    public function index()
    {
        $data = Kelas::join('kategori_kelas','kategori_kelas.id','kelas.kategori_id')
                        ->get(['kelas.name','kategori_kelas.category']);
       return view('pages.kelas.index',compact('data'));
    }


    public function create()
    {
        $kategori_kelas = KategoriKelas::all();
        return view('pages.kelas.create',compact('kategori_kelas'));
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kategori_id'   => 'required',
            'name'          => 'required|string|uniqeu:kelas,name|max:4'
        ]);

        $validateData['name'] = strtoupper($validateData['name']);
        $kelas   = Kelas::create($validateData);

        return redirect()->route('class.index')->with('success','Kelas Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id)->delete();

        return redirect()->route('class.index')->with('delete','Delete Data Kelas Berhasil');
    }
}
