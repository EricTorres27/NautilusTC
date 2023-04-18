<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[

            'id' => 1,
            'name' => 'Eric Torres',
            'idNumber' => 'A01700249',
            'email' => 'a01700249@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Administrador',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 2,
            'name' => 'Pablo Valencia',
            'idNumber' => 'A01700912',
            'email' => 'a01700912@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Estudiante',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 3,
            'name' => 'Valeria Guerra',
            'idNumber' => 'A01705318',
            'email' => 'a01705318@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Estudiante',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 4,
            'name' => 'Bernardo Estrada',
            'idNumber' => 'A01704320',
            'email' => 'a01704320@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Estudiante',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 5,
            'name' => 'Jesús Olmos',
            'idNumber' => 'A01275595',
            'email' => 'a01275595@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Estudiante',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 6,
            'name' => 'Samuel González',
            'idNumber' => 'A01704696',
            'email' => 'a01704696@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Estudiante',
            'password' => Hash::make('password'),
        ],
        [
            'id' => 7,
            'name' => 'Martín Noboa',
            'idNumber' => 'A01704052',
            'email' => 'a01704052@tec.mx',
            'consent_information' => true,
            'consent_practices' => true,
            'rol' => 'Estudiante',
            'password' => Hash::make('password'),
        ]
        ]);
    }
}
