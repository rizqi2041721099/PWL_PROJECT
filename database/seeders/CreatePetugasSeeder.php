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
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $petugas->assignRole([$role->id]);

        /* =========================================================================================== */
        $petugas = User::create([
            'name'  => 'Risky',
            'email' => 'risky@gmail.com',
            'password'  => Hash::make('risky123')
        ]);

        $role = Role::where('name', 'PETUGAS')->first();
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $petugas->assignRole([$role->id]);
    }
}
