<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsuarioRol;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsuarioRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usuarioSU = User::where('cedula', '26770955')->first();
        $usuarioGe = User::where('cedula', '18900129')->first();
        $rolsu = Rol::find(1);
        $rolge = Rol::find(2);


        $usuarioSU->roles()->attach($rolsu->id);
        $usuarioSU->save();

        $usuarioGe->roles()->attach($rolge->id);
        $usuarioGe->save();
        //DB::table('usuario_rol')->insert([
          //  'cedula' => $usuarioSU->cedula,
         //   'rol_id' => $rolsu->id,
        //]);
        //DB::table('usuario_rol')->insert([
          // 'cedula' => $usuarioGe->cedula,
         //   'rol_id' => $rolge->id,
        //]);
        
        
    }
}
