<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memes')->insert([
            'title' => "A",
            'slug' => "a",
            'content' => 'a',
            'is_published' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'like' => 101,
            'date_added' => Carbon::now()->addSeconds(10)->format('Y-m-d H:i:s'),

        ]);

        DB::table('memes')->insert([
            'title' => 'Magnam',
            'slug' => 'magnam',
            'content' => 'magnam',
            'is_published' => 1,
            'user_id' => 2,
            'category_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'like' => 110,
            'date_added' => Carbon::now()->addSeconds(15)->format('Y-m-d H:i:s'),
        ]);

        DB::table('memes')->insert([
            'title' => 'Aut',
            'slug' => 'aut',
            'content' => 'aut',
            'is_published' => 0,
            'user_id' => 3,
            'category_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'like' => 31,
        ]);

        DB::table('memes')->insert([
            'title' => 'Vel quos',
            'slug' => 'vel-quos',
            'content' => 'vel',
            'is_published' => 1,
            'user_id' => 3,
            'category_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'like' => 131,
            'date_added' => Carbon::now()->addSeconds(20)->format('Y-m-d H:i:s'),
        ]);

        DB::table('memes')->insert([
            'title' => 'In',
            'slug' => 'in',
            'content' => 'in',
            'is_published' => 0,
            'user_id' => 2,
            'category_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'like' => 56,
        ]);

    }
}
