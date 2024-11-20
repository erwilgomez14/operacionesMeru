<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modeloplanta;
class modeloplantas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modeloplanta::create([
            'concepto' => 'Plantas de ciclo completo',            
        ]);
        Modeloplanta::create([
            'concepto' => 'Plantas compactas',            
        ]);
    }
}
