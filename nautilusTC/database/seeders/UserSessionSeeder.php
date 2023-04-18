<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_sessions')->insert([[

            'id' => 1,
            'user_id' => 2,
            'session_id' =>1 ,
        ],
        [
            'id' => 2,
            'user_id' => 3,
            'session_id' => 1 ,
        ],
        [
            'id' => 3,
            'user_id' => 3,
            'session_id' => 2,
        ],
        [
            'id' => 4,
            'user_id' => 4,
            'session_id' => 2,
        ],
        [
            'id' => 5,
            'user_id' => 5,
            'session_id' => 3,
        ],
        [
            'id' => 6,
            'user_id' => 6,
            'session_id' =>3 ,
        ],
        [
            'id' => 7,
            'user_id' => 7,
            'session_id' => 4,
        ],
        [
            'id' => 8,
            'user_id' => 2,
            'session_id' => 4,
        ]
        ]);
    }
}
