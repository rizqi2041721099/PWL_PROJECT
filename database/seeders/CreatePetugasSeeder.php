<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatePetugasSeeder extends Seeder
{

    public function run()
    {
        $petugas = User::create([
            'name'  => 'Patugas1',
            'email' => 'petugas@gmail.com',
            'password'  => Hash::make('petugas123')
        ]);

        $role = Role::where('name', 'PETUGAS')->first();
        $role->givePermissionTo([
            'peminjaman-list',
            'peminjaman-create',
            'peminjaman-edit',
            'pengembalian-list',
            'pengembalian-show',
            'menu-transactions',
            'menu-dashboard'
        ]);

        $petugas->assignRole([$role->id]);
    }
}
