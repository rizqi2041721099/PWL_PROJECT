<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'password'  => Hash::make('password')
        ]);

        $role = Role::where('name', 'ADMIN')->first();
        $permissions = Permission::pluck('id', 'name')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
    }
}
