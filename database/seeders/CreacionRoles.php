<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreacionRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arregloRoles = [
            'Administrador',
            'cliente',
            'jefe-cocina',
            'mesero',
        ];
        foreach ($arregloRoles as $rol) {
            Rol::create(['nombre' => $rol]);
        }
    }
}
