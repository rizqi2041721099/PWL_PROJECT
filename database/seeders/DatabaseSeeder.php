<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KategoriKelasSeeder::class,
            PenerbitSeeder::class,
            KelasSeeder::class,
            CreatePermissionSeeder::class,
            CreateRoleSeeder::class,
            CreateAdminSeeder::class,
            CreatePetugasSeeder::class,
            CreateAnggotaSeeder::class,
        ]);
    }
}
