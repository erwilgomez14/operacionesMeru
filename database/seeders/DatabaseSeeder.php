<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UsuariosSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsuarioRolSeeder::class);
        $this->call(TipoOrdenSeeder::class);
        $this->call(PrioridadSeeder::class);
        $this->call(GerenciaSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(modeloplantas::class);
        $this->call(AreaSeeders::class);
    }
}
