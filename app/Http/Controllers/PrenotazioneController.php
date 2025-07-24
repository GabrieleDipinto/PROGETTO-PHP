<?php

namespace App\Http\Controllers;

use App\Models\Prenotazione;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class PrenotazioneController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        Log::info('PrenotazioneController@index', [
            'user_id' => auth()->id()
        ]);

        $prenotazioni = auth()->user()->prenotazioni()
            ->orderBy('data_ritiro', 'desc')
            ->paginate(10);
        
        return view('prenotazioni.index', compact('prenotazioni'));
    }

    public function create()
    {
        $this->authorize('create', Prenotazione::class);
        return view('prenotazioni.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Prenotazione::class);

        $validated = $request->validate([
            'tipo_rifiuto' => 'required|string|max:50',
            'quantita' => 'required|numeric|min:0.1|max:10',
            'data_ritiro' => [
                'required',
                'date',
                'after:' . Carbon::now()->addDays(1)->format('Y-m-d')
            ],
            'note' => 'nullable|string|max:1000',
        ], [
            'data_ritiro.after' => 'La data del ritiro deve essere di almeno 2 giorni successiva alla data odierna.',
            'quantita.max' => 'La quantità massima consentita è di 10 metri cubi.',
            'quantita.min' => 'La quantità minima deve essere di almeno 0.1 metri cubi.'
        ]);

        $prenotazione = new Prenotazione($validated);
        $prenotazione->id_utente = auth()->id();
        $prenotazione->stato = 'in_attesa';
        $prenotazione->save();

        return redirect()->route('dashboard')
            ->with('success', 'Prenotazione creata con successo! Riceverai una conferma quando verrà presa in carico.');
    }

    public function show(Prenotazione $prenotazione)
    {
        Log::info('PrenotazioneController@show', [
            'user_id' => auth()->id(),
            'prenotazione' => $prenotazione->toArray()
        ]);

        try {
            $this->authorize('view', $prenotazione);
            return view('prenotazioni.show', compact('prenotazione'));
        } catch (\Exception $e) {
            Log::error('PrenotazioneController@show error', [
                'error' => $e->getMessage(),
                'user_id' => auth()->id(),
                'prenotazione_id' => $prenotazione->id,
                'prenotazione_user_id' => $prenotazione->id_utente
            ]);
            throw $e;
        }
    }

    public function destroy(Prenotazione $prenotazione)
    {
        Log::info('PrenotazioneController@destroy - Start', [
            'user_id' => auth()->id(),
            'prenotazione' => $prenotazione->toArray()
        ]);

        try {
            Log::info('PrenotazioneController@destroy - Before authorization');
            $this->authorize('delete', $prenotazione);
            Log::info('PrenotazioneController@destroy - After authorization');
            
            if ($prenotazione->stato !== 'in_attesa') {
                return back()->with('error', 'Non puoi cancellare una prenotazione già confermata o completata.');
            }

            $prenotazione->delete();
            return redirect()->route('prenotazioni.index')
                ->with('success', 'Prenotazione cancellata con successo.');
        } catch (\Exception $e) {
            Log::error('PrenotazioneController@destroy error', [
                'error' => $e->getMessage(),
                'user_id' => auth()->id(),
                'prenotazione_id' => $prenotazione->id,
                'prenotazione_user_id' => $prenotazione->id_utente,
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }
} 