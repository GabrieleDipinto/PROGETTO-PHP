<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class PuntoRaccoltaController extends Controller
{
    /**
     * Get all collection points
     */
    public function index(): JsonResponse
    {
        // Punti di raccolta nell'area di Roma e dintorni
        $puntiRaccolta = [
            [
                'id' => 1,
                'nome' => 'Centro Raccolta EUR',
                'indirizzo' => 'Via dell\'Oceano Pacifico, 83',
                'latitudine' => 41.8275,
                'longitudine' => 12.4621,
                'orario_apertura' => '08:00',
                'orario_chiusura' => '20:00',
                'stato' => 'aperto',
                'tipo' => 'centro principale',
                'servizi' => ['ingombranti', 'elettronici', 'verde', 'pericolosi']
            ],
            [
                'id' => 2,
                'nome' => 'Isola Ecologica Tuscolana',
                'indirizzo' => 'Via Palmiro Togliatti, 69',
                'latitudine' => 41.8675,
                'longitudine' => 12.5421,
                'orario_apertura' => '07:30',
                'orario_chiusura' => '19:30',
                'stato' => 'aperto',
                'tipo' => 'isola ecologica',
                'servizi' => ['ingombranti', 'elettronici', 'verde']
            ],
            [
                'id' => 3,
                'nome' => 'Punto Verde Ostia',
                'indirizzo' => 'Via Mar dei Caraibi, 100',
                'latitudine' => 41.7325,
                'longitudine' => 12.2821,
                'orario_apertura' => '09:00',
                'orario_chiusura' => '18:00',
                'stato' => 'aperto',
                'tipo' => 'centro raccolta',
                'servizi' => ['verde', 'compost']
            ],
            [
                'id' => 4,
                'nome' => 'EcoCenter Tiburtina',
                'indirizzo' => 'Via Tiburtina, 1200',
                'latitudine' => 41.9175,
                'longitudine' => 12.5821,
                'orario_apertura' => '08:30',
                'orario_chiusura' => '19:00',
                'stato' => 'aperto',
                'tipo' => 'centro principale',
                'servizi' => ['ingombranti', 'elettronici', 'pericolosi']
            ],
            [
                'id' => 5,
                'nome' => 'Punto Raccolta Flaminio',
                'indirizzo' => 'Via Flaminia, 600',
                'latitudine' => 41.9375,
                'longitudine' => 12.4721,
                'orario_apertura' => '08:00',
                'orario_chiusura' => '18:30',
                'stato' => 'aperto',
                'tipo' => 'centro raccolta',
                'servizi' => ['ingombranti', 'verde']
            ],
            [
                'id' => 6,
                'nome' => 'EcoPunto Prati',
                'indirizzo' => 'Via degli Scipioni, 241',
                'latitudine' => 41.9075,
                'longitudine' => 12.4621,
                'orario_apertura' => '09:30',
                'orario_chiusura' => '18:00',
                'stato' => 'aperto',
                'tipo' => 'punto raccolta',
                'servizi' => ['elettronici', 'batterie']
            ],
            [
                'id' => 7,
                'nome' => 'Centro Raccolta Prenestina',
                'indirizzo' => 'Via Prenestina, 900',
                'latitudine' => 41.8875,
                'longitudine' => 12.5921,
                'orario_apertura' => '07:00',
                'orario_chiusura' => '20:00',
                'stato' => 'aperto',
                'tipo' => 'centro principale',
                'servizi' => ['ingombranti', 'elettronici', 'verde', 'pericolosi', 'pneumatici']
            ]
        ];

        return response()->json($puntiRaccolta);
    }
} 