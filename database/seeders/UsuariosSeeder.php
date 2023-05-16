<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'cedula' => '26770955',
            'usuario' => 'erdiaz',
            'nombre' => 'Erwil Diaz',
            'cargo' => 'Analista QAS',
        ]);

        User::create([
            'cedula' => '18900129',
            'usuario' => 'gcvasquez',
            'nombre' => 'Gerardine Vasquez',
            'cargo' => 'Jefe de planificaion de mantenimiento',           
        ]);
    }
}
