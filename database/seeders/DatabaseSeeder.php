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
            UsersSeeder::class,
            UserInformationSeeder::class,
            UserAdminsSeeder::class,
            PostCategoriesSeeder::class,
            PostsSeeder::class,
            PostCommentsSeeder::class,
            PostCommentRepliesSeeder::class,
            PostRatingsSeeder::class,
            PostCommentRatingsSeeder::class
        ]);
    }
}
