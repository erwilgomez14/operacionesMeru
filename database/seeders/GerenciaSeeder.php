<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gerencia;


class GerenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gerencia::create([
            'id_gerencia' => '001',
            'nombre_gerencia' => 'GERENCIA DE MANTENIMIENTO SUR'
        ]);
        Gerencia::create([
            'id_gerencia' => '002',
            'nombre_gerencia' => 'GERENCIA MANTENIMIENTO OESTE'
        ]);
        Gerencia::create([
            'id_gerencia' => '003',
            'nombre_gerencia' => 'GERENCIA MANTENIMIENTO CARONI'
        ]);
    }
}
