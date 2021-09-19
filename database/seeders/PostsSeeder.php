<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'This is the first post',
                'excerpt' => 'DB:Seed',
                'body' => 'This is the first post made to my site. This post was added via a the DB:Seed command',
                'img' => 'default_image.jpg',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'This is the second post',
                'excerpt' => 'DB:Seed an array of posts',
                'body' => 'This is the second post made to my site. This post was added via a the DB:Seed command by placing an array of posts into the seeder',
                'img' => 'default_image.jpg',
                'user_id' => 2,
                'category_id' => 1,
                'created_at' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::tomorrow()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
