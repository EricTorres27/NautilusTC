<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sessions')->insert([[

            'id' => 1,
            'format' => 'Remoto',
            'wordCount' => 250,
            'durationHours' => 0,
            'durationMinutes' => 30,
            'durationSeconds' => 15,
            'created_at' =>now()->format('Y-m-d') 
        ],
        [
            'id' => 2,
            'format' => 'Remoto',
            'wordCount' => 250,
            'durationHours' => 0,
            'durationMinutes' => 30,
            'durationSeconds' => 15,
            'created_at' =>now()->format('Y-m-d') 
        ],
        [
            'id' => 3,
            'format' => 'Remoto',
            'wordCount' => 250,
            'durationHours' => 0,
            'durationMinutes' => 30,
            'durationSeconds' => 15,
            'created_at' =>now()->format('Y-m-d') 
        ],
        [
            'id' => 4,
            'format' => 'Remoto',
            'wordCount' => 250,
            'durationHours' => 0,
            'durationMinutes' => 30,
            'durationSeconds' => 15,
            'created_at' =>now()->format('Y-m-d') 
        ]
        ]);
    }
}
