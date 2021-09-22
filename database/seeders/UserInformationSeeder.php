<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_Information')->insert([
            [
                'user_id' => 1,
                'forename' => 'Nathan',
                'surname' => 'Addison',
                'avatar' => 'gru.jpg',
                'date_of_birth' => '17/06/1994',
                'gender' => 'Male',
                'country' => 'England',
                'ethnicity' => 'British',
                'last_login_date' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'forename' => 'Luke',
                'surname' => 'Golder',
                'avatar' => null,
                'date_of_birth' => null,
                'gender' => 'Male',
                'country' => 'England',
                'ethnicity' => 'English',
                'last_login_date' =>  Carbon::now()->subHour()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'forename' => 'Dean',
                'surname' => 'Welsh',
                'avatar' => 'deano.jpg',
                'date_of_birth' => null,
                'gender' => 'Male',
                'country' => 'England',
                'ethnicity' => 'British',
                'last_login_date' => null
            ]
        ]);
    }
}
