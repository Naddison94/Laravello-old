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
                'img' => 'bullymaguire-joker.gif',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::yesterday()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::yesterday()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Pepe sits',
                'excerpt' => 'Because he fits',
                'body' => 'This is a frog sitting in a chair, he sits because he fits',
                'img' => 'pepe_sit.gif',
                'user_id' => 2,
                'category_id' => 1,
                'created_at' => Carbon::now()->subHour()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->subHour()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'ORANGE MAN YES HE CAN',
                'excerpt' => 'He\'s orange',
                'body' => 'Orange man oooh why are you orange',
                'img' => 'default_image.jpg',
                'user_id' => 3,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
