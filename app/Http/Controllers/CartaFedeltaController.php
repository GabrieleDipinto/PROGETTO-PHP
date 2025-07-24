<?php

namespace App\Http\Controllers;

use App\Models\CartaFedelta;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CartaFedeltaController extends Controller
{
    public function index()
    {
        $cartaFedelta = auth()->user()->cartaFedelta;
        
        if (!$cartaFedelta) {
            // Se l'utente non ha una carta fedeltà, ne creiamo una nuova
            $cartaFedelta = CartaFedelta::create([
                'id_utente' => auth()->id(),
                'punti_accumulati' => 0,
                'data_attivazione' => Carbon::now(),
                'data_scadenza' => Carbon::now()->addYear() // La carta scade dopo un anno
            ]);
        }

        // Calcoliamo il livello della carta in base ai punti
        $livello = 'Base';
        if ($cartaFedelta->punti_accumulati >= 1000) {
            $livello = 'Platino';
        } elseif ($cartaFedelta->punti_accumulati >= 500) {
            $livello = 'Oro';
        } elseif ($cartaFedelta->punti_accumulati >= 200) {
            $livello = 'Argento';
        }

        // Calcoliamo i punti mancanti per il prossimo livello
        $puntiProssimoLivello = 0;
        if ($cartaFedelta->punti_accumulati < 200) {
            $puntiProssimoLivello = 200 - $cartaFedelta->punti_accumulati;
        } elseif ($cartaFedelta->punti_accumulati < 500) {
            $puntiProssimoLivello = 500 - $cartaFedelta->punti_accumulati;
        } elseif ($cartaFedelta->punti_accumulati < 1000) {
            $puntiProssimoLivello = 1000 - $cartaFedelta->punti_accumulati;
        }

        // Prendiamo le ultime 5 prenotazioni completate per mostrare i punti guadagnati
        $ultimePrenotazioni = auth()->user()->prenotazioni()
            ->where('stato', 'completata')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        return view('carta-fedelta.index', compact('cartaFedelta', 'livello', 'puntiProssimoLivello', 'ultimePrenotazioni'));
    }
} 