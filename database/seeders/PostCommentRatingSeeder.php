<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCommentRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_comment_ratings')->insert([
            [
                'comment_id' => 1,
                'user_id' => 1,
                'upvote' => 1,
                'downvote' => 0,
                'archived' => 0
            ]
        ]);
    }
}
