<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::create([
            'id_area' => 'A001',
            'nombre_area' => 'C',
            'descripcion_area' => 'CAPTACION',

        ]);
        Area::create([
            'id_area' => 'A002',
            'nombre_area' => 'AL',
            'descripcion_area' => 'ALMACENAMIENTO',
        ]);
        Area::create([
            'id_area' => 'A003',
            'nombre_area' => 'T',
            'descripcion_area' => 'TRATAMIENTO',
        ]);
        Area::create([
            'id_area' => 'A004',
            'nombre_area' => 'D',
            'descripcion_area' => 'DISTRIBUCION',
        ]);
    }
}
