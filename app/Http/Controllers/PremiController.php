<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartaFedelta;

class PremiController extends Controller
{
    public function riscatta(Request $request)
    {
        $request->validate([
            'premio' => 'required|in:10,15,25',
        ]);

        $user = Auth::user();
        $carta = $user->cartaFedelta;
        if (!$carta) {
            return back()->with('error', 'Carta fedeltà non trovata.');
        }

        $premio = (int) $request->premio;
        $punti_necessari = [10 => 1500, 15 => 2000, 25 => 5000][$premio];

        if ($carta->punti_accumulati < $punti_necessari) {
            return back()->with('error', 'Punti insufficienti per riscattare questo premio.');
        }

        // Scala i punti e aggiungi il saldo
        $carta->punti_accumulati -= $punti_necessari;
        $carta->saldo_euro += $premio;
        $carta->save();

        return back()->with('success', "Hai riscattato un buono da {$premio}€! Il saldo è stato aggiornato sulla tua carta.");
    }
} 