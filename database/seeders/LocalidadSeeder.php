<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localidad;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Localidad::create([
            'codubi' => '001',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'codloc' => '01',
            'desubi' => 'SECTOR VILLA BAHIA, PUERTO ORDAZ',
        ]);
        Localidad::create([
            'codubi' => '002',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'codloc' => '001',
            'desubi' => 'SECTOR TORO MUERTO, PUERTO ORDAZ',
        ]);
        Localidad::create([
            'codubi' => '003',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'codloc' => '001',
            'desubi' => 'EL SOL DE CAMBALACHE, PUERTO ORDAZ',
        ]);
        Localidad::create([
            'codubi' => '004',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'codloc' => '002',
            'desubi' => 'SECTOR LUIS HURTADO, SAN FELIX',
        ]);
        Localidad::create([
            'codubi' => '005',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'codloc' => '002',
            'desubi' => 'UD 128, SAN FELIX',
        ]);
        Localidad::create([
            'codubi' => '006',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '05',
            'codloc' => '004',
            'desubi' => 'CALLE BOLIVAR, CIUDAD BOLIVAR',
        ]);
        Localidad::create([
            'codubi' => '007',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '05',
            'codloc' => '004',
            'desubi' => 'SECTOR PERRO SECO, CIUDAD BOLIVAR',
        ]);
        Localidad::create([
            'codubi' => '008',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '02',
            'codloc' => '011',
            'desubi' => 'CAICARA DEL ORINOCO',
        ]);
        Localidad::create([
            'codubi' => '009',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '10',
            'codloc' => '013',
            'desubi' => 'MARIPA',
        ]);
        Localidad::create([
            'codubi' => '010',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '10',
            'codloc' => '013',
            'desubi' => 'GUARATARO',
        ]);
        
        Localidad::create([
            'codubi' => '011',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '10',
            'codloc' => '017',
            'desubi' => 'MOITACO',
        ]);
        Localidad::create([
            'codubi' => '012',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '06',
            'codloc' => '021',
            'desubi' => 'EL PAO',
        ]);
        Localidad::create([
            'codubi' => '013',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '06',
            'codloc' => '022',
            'desubi' => 'TERECAY, EL MANTECO',
        ]);
        Localidad::create([
            'codubi' => '014',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '09',
            'codloc' => '009',
            'desubi' => 'SECTOR SAN PEDRO, TUMEREMO',
        ]);
        Localidad::create([
            'codubi' => '015',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '06',
            'codloc' => '005',
            'desubi' => 'SANTA ROSA, UPATA',
        ]);
        Localidad::create([
            'codubi' => '016',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '06',
            'codloc' => '005',
            'desubi' => 'SANTA ROSA, UPATA',
        ]);
        Localidad::create([
            'codubi' => '017',
            'codpai' => '01',
            'codest' => '01',
             'codmun' => '04',
            'codloc' => '010',
            'desubi' => 'SANTA ELENA DE UAIREN, 1',
        ]);
        Localidad::create([
            'codubi' => '018',
            'codpai' => '01',
            'codest' => '01',
             'codmun' => '04',
            'codloc' => '010',
            'desubi' => 'SANTA ELENA DE UAIREN, 2',
        ]);
        Localidad::create([
            'codubi' => '019',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '09',
            'codloc' => '012',
            'desubi' => 'EL DORADO',
        ]);
        Localidad::create([
            'codubi' => '020',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '01',
            'codloc' => '007',
            'desubi' => 'TRONCAL 10, EL CALLAO',
        ]);
        Localidad::create([
            'codubi' => '021',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '11',
            'codloc' => '008',
            'desubi' => 'EL PALMAR',
        ]);
        Localidad::create([
            'codubi' => '022',
            'codpai' => '01',
            'codest' => '01',
            'codmun' => '02',
            'codloc' => '026',
            'desubi' => 'LA URBANA',
        ]);
    }
}
