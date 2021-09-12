<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Comments')->insert([
            'user_id'  => 1,
            'post_id'  => 1,
            'comment'  => 'This is a comment'
        ]);
    }
}
