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
            RolesAndPermissionsTableSeeder::class,
            UserTableSeeder::class,
            PhotosTableSeeder::class,
            CategoryTableSeeder::class,
            MemTableSeeder::class,
            TagTableSeeder::class,
            MemTagTableSeeder::class
        ]);
    }
}

