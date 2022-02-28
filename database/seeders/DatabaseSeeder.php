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
           RolesAndPermissionsTableSeeder::class, //1
           UserTableSeeder::class, //1
           // PhotosTableSeeder::class //3
        ]);
    }
}
//2

//MemTag::withoutEvents(function () {
//    return MemTag::factory()->count(10)->create();
//});
