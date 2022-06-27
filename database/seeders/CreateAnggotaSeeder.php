<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAnggotaSeeder extends Seeder
{

    public function run()
    {
        $anggota = User::create([
            'name'  => 'Doni',
            'email' => 'doni@gmail.com',
            'password'  => Hash::make('doni123')
        ]);

        $role = Role::where('name', 'ANGGOTA')->first();
        $role->givePermissionTo([
            'peminjaman-list',
            'pengembalian-list',
            'menu-dashboard',
            'menu-transactions',
        ]);

        $anggota->assignRole([$role->id]);
    }
}
