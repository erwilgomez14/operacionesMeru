<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoOrdenTrabajo;

class TipoOrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoOrdenTrabajo::create([
            'id_tipo_orden' => 1,
            'desc_orden' => 'PREVENTIVO'
        ]);
        TipoOrdenTrabajo::create([
            'id_tipo_orden' => 2,
            'desc_orden' => 'CORRECTIVO'
        ]);
        TipoOrdenTrabajo::create([
            'id_tipo_orden' => 3,
            'desc_orden' => 'PREDICTIVO'
        ]);
        TipoOrdenTrabajo::create([
            'id_tipo_orden' => 4,
            'desc_orden' => 'OTRO'
        ]);
    }
}
