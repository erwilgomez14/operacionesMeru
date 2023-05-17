<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '001',
            'nomloc' => 'PUERTO ORDAZ',
            'alioc' => 'PO',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);
        Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '002',
            'nomloc' => 'SAN FELIX',
            'alioc' => 'SF',
            'codmun' => '01',
            'codlocsig' => '02',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '003',
            'nomloc' => 'CIUDAD PIAR',
            'alioc' => 'CP',
            'codmun' => '07',
            'codlocsig' => '03',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '004',
            'nomloc' => 'CIUDAD BOLIVAR',
            'alioc' => 'CB',
            'codmun' => '05',
            'codlocsig' => '04',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '005',
            'nomloc' => 'UPATA',
            'alioc' => 'UP',
            'codmun' => '06',
            'codlocsig' => '05',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '006',
            'nomloc' => 'GUASIPATI',
            'alioc' => 'GU',
            'codmun' => '08',
            'codlocsig' => '06',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '007',
            'nomloc' => 'EL CALLAO',
            'alioc' => 'EC',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '008',
            'nomloc' => 'EL PALMAR',
            'alioc' => 'EP',
            'codmun' => '08',
            'codlocsig' => '08',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '001',
            'nomloc' => 'PUERTO ORDAZ',
            'alioc' => 'PO',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '001',
            'nomloc' => 'PUERTO ORDAZ',
            'alioc' => 'PO',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '001',
            'nomloc' => 'PUERTO ORDAZ',
            'alioc' => 'PO',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '001',
            'nomloc' => 'PUERTO ORDAZ',
            'alioc' => 'PO',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);Ciudad::create([
            'codpai' => '01',
            'codest' => '01',
            'codloc' => '001',
            'nomloc' => 'PUERTO ORDAZ',
            'alioc' => 'PO',
            'codmun' => '01',
            'codlocsig' => '01',
        ]);
    }
}
