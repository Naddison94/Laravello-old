<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_admins')->insert([
            [
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'archived_by' => null,
                'archived' => 0
            ],
            [
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()->addHour()->format('Y-m-d H:i:s'),
                'archived_by' => 1,
                'archived' => 1
            ]
        ]);
    }
}
