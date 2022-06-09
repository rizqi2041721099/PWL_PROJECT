<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'ADMIN',
            'PETUGAS',
            'ANGGOTA',
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                [
                    'name' => $role,
                ],
            );
        }
    }
}
