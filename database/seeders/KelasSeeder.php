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
        $kelas = [
            [
                'name'  => 'X'
            ],
            [
                'name' => 'XI'
            ],
            [
                'name' => 'XII'
            ],
        ];

        Kelas::insert($kelas);
    }
}
