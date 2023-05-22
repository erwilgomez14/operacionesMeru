<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'nommun' => 'CARONI',
            'alimun' => 'CA'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '02',
            'nommun' => 'CEDEÑO',
            'alimun' => 'CE'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '03',
            'nommun' => 'EL CALLAO',
            'alimun' => 'EC'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '04',
            'nommun' => 'GRAN SABANA',
            'alimun' => 'GS'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '05',
            'nommun' => 'ANGOSTURA DEL ORINOCO',
            'alimun' => 'ADO'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '06',
            'nommun' => 'PIAR',
            'alimun' => 'PI'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '07',
            'nommun' => 'RAUL LEONI',
            'alimun' => 'RL'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '08',
            'nommun' => 'ROSCIO',
            'alimun' => 'RO'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '09',
            'nommun' => 'SIFONTES',
            'alimun' => 'SI'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '10',
            'nommun' => 'SUCRE',
            'alimun' => 'SU'
        ]);Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '11',
            'nommun' => 'PADRE PEDRO CHIEN',
            'alimun' => 'RO'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '12',
            'nommun' => 'ANGOSTURA',
            'alimun' => 'AN'
        ]);
        Municipio::create([
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '99',
            'nommun' => 'POR ASIGNAR',
            'alimun' => 'P/A'
        ]);
    }
}
