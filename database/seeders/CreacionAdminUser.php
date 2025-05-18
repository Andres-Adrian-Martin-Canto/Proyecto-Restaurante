<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreacionAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // * Creacion de los seeder para el administrador
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
            'telefono' => '9831816468',
            'id_roles' => 1
        ]);
    }
}
