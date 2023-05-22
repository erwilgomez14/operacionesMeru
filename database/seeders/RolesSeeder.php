<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'id' => '1',
            'nombre' => 'Super Usuario',
            'slug' => 'super-usuario',
        ]);
        Rol::create([
            'id' => '2',
            'nombre' => 'Gerente',
            'slug' => 'gerente',
        ]);
    }
}
