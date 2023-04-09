<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([[
            'id' => 1,
            'name' => 'Administrador',
            'description' => 'Rol para administradores del sistema.',
        ],
        [
            'id' => 2,
            'name' => 'Profesor',
            'description' => 'Rol para profesores del sistema',
        ],
        [
            'id' => 3,
            'name' => 'Estudiante',
            'description' => 'Rol para estudiantes del sistema',
        ]
        ]);
    }
}
