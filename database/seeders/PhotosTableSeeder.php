<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Mem;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 0; $i < 2; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\User',
                'photoable_id' => User::all()->unique()->random()->id,
                'path' => 'users/user.png'
            ]);
        }

        for($i = 0; $i < 10; $i++)
        {
            DB::table('photos')->insert([
                'photoable_type' => 'App\Models\Mem',
                'photoable_id' => Mem::all()->unique()->random()->id,
                'path' => 'memes/mem'.$i.'.png'
            ]);
        }
    }
}
