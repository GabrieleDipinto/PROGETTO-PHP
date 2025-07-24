<?php

namespace App\Http\Controllers;

use App\Models\Segnalazione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SegnalazioneController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $segnalazioni = auth()->user()->segnalazioni()->latest()->paginate(10);
        return view('segnalazioni.index', compact('segnalazioni'));
    }

    public function create()
    {
        return view('segnalazioni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:50',
            'descrizione' => 'required|string|max:1000',
            'via' => 'required|string|max:100',
            'civico' => 'required|string|max:10',
            'cap' => 'required|string|max:10',
            'immagine' => 'nullable|image|max:2048' // max 2MB
        ]);

        if ($request->hasFile('immagine')) {
            // Salva l'immagine nella cartella public/segnalazioni
            $path = $request->file('immagine')->store('public/segnalazioni');
            // Modifica il percorso per rimuovere 'public/' dall'inizio
            $validated['immagine'] = str_replace('public/', '', $path);
        }

        $segnalazione = auth()->user()->segnalazioni()->create([
            'tipo' => $validated['tipo'],
            'descrizione' => $validated['descrizione'],
            'via' => $validated['via'],
            'civico' => $validated['civico'],
            'cap' => $validated['cap'],
            'immagine' => $validated['immagine'] ?? null,
            'stato' => 'in_attesa'
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Segnalazione inviata con successo!');
    }

    public function show(Segnalazione $segnalazione)
    {
        $this->authorize('view', $segnalazione);
        return view('segnalazioni.show', compact('segnalazione'));
    }

    public function edit(Segnalazione $segnalazione)
    {
        $this->authorize('update', $segnalazione);
        return view('segnalazioni.edit', compact('segnalazione'));
    }

    public function update(Request $request, Segnalazione $segnalazione)
    {
        $this->authorize('update', $segnalazione);

        $validated = $request->validate([
            'tipo' => 'required|string|max:50',
            'descrizione' => 'required|string|max:1000',
            'via' => 'required|string|max:100',
            'civico' => 'required|string|max:10',
            'cap' => 'required|string|max:10',
            'immagine' => 'nullable|image|max:2048'
        ]);

        if ($segnalazione->stato !== 'in_attesa') {
            return back()->with('error', 'Puoi modificare solo le segnalazioni in attesa.');
        }

        if ($request->hasFile('immagine')) {
            $path = $request->file('immagine')->store('public/segnalazioni');
            $validated['immagine'] = str_replace('public/', '', $path);
        }

        $segnalazione->update($validated);

        return redirect()->route('segnalazioni.index')
            ->with('success', 'Segnalazione aggiornata con successo!');
    }
} 