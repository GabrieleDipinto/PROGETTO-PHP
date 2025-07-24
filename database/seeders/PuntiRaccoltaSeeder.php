<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuntiRaccoltaSeeder extends Seeder
{
    public function run(): void
    {
        $punti = [
            [
                'nome' => 'Centro Raccolta Nord',
                'via' => 'Via Roma',
                'civico' => '123',
                'cap' => '00100',
                'latitudine' => 41.9028,
                'longitudine' => 12.4964,
                'orario_apertura' => '08:00',
                'orario_chiusura' => '18:00',
                'tipo_rifiuto' => 'Tutti i tipi',
                'stato' => 'aperto'
            ],
            [
                'nome' => 'Isola Ecologica Est',
                'via' => 'Via Milano',
                'civico' => '45',
                'cap' => '00100',
                'latitudine' => 41.9109,
                'longitudine' => 12.5145,
                'orario_apertura' => '07:30',
                'orario_chiusura' => '19:00',
                'tipo_rifiuto' => 'Rifiuti ingombranti',
                'stato' => 'aperto'
            ],
            [
                'nome' => 'Punto Verde Sud',
                'via' => 'Via Napoli',
                'civico' => '78',
                'cap' => '00100',
                'latitudine' => 41.8919,
                'longitudine' => 12.4933,
                'orario_apertura' => '09:00',
                'orario_chiusura' => '17:00',
                'tipo_rifiuto' => 'Rifiuti speciali',
                'stato' => 'aperto'
            ]
        ];

        foreach ($punti as $punto) {
            DB::table('punti_raccolta')->insert($punto);
        }
    }
} 