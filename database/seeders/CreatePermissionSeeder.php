<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CreatePermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'books-list',
            'books-create',
            'books-edit',
            'books-delete',
            'raks-list',
            'raks-create',
            'raks-edit',
            'raks-delete',
            'penerbit-list',
            'penerbit-create',
            'penerbit-edit',
            'penerbit-delete',
            'peminjaman-list',
            'peminjaman-create',
            'peminjaman-edit',
            'peminjaman-delete',
            'pengembalian-list',
            'pengembalian-create',
            'pengembalian-edit',
            'pengembalian-delete',
            'anggota-list',
            'anggota-create',
            'anggota-edit',
            'anggota-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
