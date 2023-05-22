<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrioridadOrdenTrabajo;


class PrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrioridadOrdenTrabajo::create([
            'id_prioridad' => 1,
            'desc_priori' => 'NORMAL'
        ]);
        PrioridadOrdenTrabajo::create([
            'id_prioridad' => 2,
            'desc_priori' => 'URGENTE'
        ]);
    }
}
