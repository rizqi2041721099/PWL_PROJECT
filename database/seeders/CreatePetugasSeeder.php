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
            'peminjaman-delete',
            'pengembalian-list',
            'pengembalian-show',
            'pengembalian-create',
            'menu-transactions',
            'menu-dashboard'
        ]);

        $petugas->assignRole([$role->id]);

        // $role = Role::where('name', 'ANGGOTA')->first();
        // $role->syncPermissions($permissions);
        // $anggota->assignRole([$role->id]);

        // $role = Role::findByName('PETUGAS')->givePermissionTo('peminjaman-list');

        // $petugas->assignRole($permission);
        // foreach ($petugasPermission as $permission)
        // {
        //     $petugas->givePermissionTo($permission);
        // }

    }
}
