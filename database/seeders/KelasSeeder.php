<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
               'kategori_id' => 1,
               'name'       => 'X'
            ],
            [
                'kategori_id' => 2,
                'name'       => 'X'
            ],
            [
                'kategori_id' => 3,
                'name'       => 'X'
            ],
            [
                'kategori_id' => 4,
                'name'       => 'X'
            ],
            [
                'kategori_id' => 5,
                'name'       => 'X'
            ],
            [
                'kategori_id' => 1,
                'name'       => 'XI'
            ],
            [
                'kategori_id' => 2,
                'name'       => 'XI'
            ],
            [
                'kategori_id' => 3,
                'name'       => 'XI'
            ],
            [
                'kategori_id' => 4,
                'name'       => 'XI'
            ],
            [
                'kategori_id' => 5,
                'name'       => 'XI'
            ],
        ];

        Kelas::insert($data);
    }
}
