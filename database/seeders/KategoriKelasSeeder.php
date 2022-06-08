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
                'category' => 'B'
            ],
            [
                'category' => 'C'
            ],
            [
                'category' => 'D'
            ],
            [
                'category' => 'E'
            ],
        ];

        KategoriKelas::insert($kategori_kelas);
    }
}
