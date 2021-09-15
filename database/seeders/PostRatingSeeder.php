<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_ratings')->insert([
            [
                'post_id' => 1,
                'user_id' => 1,
                'upvote' => 1,
                'downvote' => 0,
                'archived' => 0
            ]
        ]);
    }
}
