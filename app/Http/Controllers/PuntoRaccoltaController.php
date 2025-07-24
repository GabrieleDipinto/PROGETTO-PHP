<?php

namespace App\Http\Controllers;

use App\Models\PuntoRaccolta;
use Illuminate\Http\Request;

class PuntoRaccoltaController extends Controller
{
    public function getPuntiRaccolta()
    {
        $puntiRaccolta = PuntoRaccolta::all();
        return response()->json($puntiRaccolta);
    }
} 