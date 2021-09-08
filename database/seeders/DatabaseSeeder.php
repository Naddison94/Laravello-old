<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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
        //todo change from factory to seeders as I am no longer using faker
         User::factory(1)->create();
         Post::factory(1)->create();
         Comment::factory(1)->create();
         Category::factory(1)->create();
    }
}
