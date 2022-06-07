<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penerbit;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penerbit = [
            [
                'name' => 'Erlangga',
            ],
            [
                'name' => 'Gramedia'
            ]
        ];
        
        Penerbit::insert($penerbit);
    }
}
