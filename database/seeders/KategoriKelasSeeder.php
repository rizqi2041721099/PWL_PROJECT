<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriKelas;

class KategoriKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_kelas = [
            [
                'category'  => 'A'
            ],
            [
                'categories' => 'B'
            ],
            [
                'categories' => 'C'
            ],
        ];

        KategoriKelas::insert($kategori_kelas);
    }
}
