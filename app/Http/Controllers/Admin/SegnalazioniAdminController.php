<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Segnalazione;
use Illuminate\Http\Request;

class SegnalazioniAdminController extends Controller
{
    // Mostra tutte le segnalazioni
    public function index()
    {
        if (!session('is_admin')) {
            abort(403);
        }
        $segnalazioni = Segnalazione::orderBy('created_at', 'desc')->get();
        return view('admin.segnalazioni', compact('segnalazioni'));
    }

    // Approva una segnalazione
    public function approva(Request $request, Segnalazione $segnalazione)
    {
        if (!session('is_admin')) {
            abort(403);
        }
        if ($segnalazione->stato !== 'in_attesa') {
            return back()->with('error', 'Solo le segnalazioni in attesa possono essere approvate.');
        }
        $segnalazione->stato = 'in_lavorazione';
        $segnalazione->save();
        return back()->with('success', 'Segnalazione approvata con successo!');
    }

    public function risolviForm(Segnalazione $segnalazione)
    {
        if (!session('is_admin')) abort(403);
        if ($segnalazione->stato !== 'in_lavorazione') {
            return back()->with('error', 'Solo le segnalazioni in lavorazione possono essere risolte.');
        }
        return view('admin.risolvi_segnalazione', compact('segnalazione'));
    }

    public function risolvi(Request $request, Segnalazione $segnalazione)
    {
        if (!session('is_admin')) abort(403);
        $request->validate([
            'nota_risoluzione' => 'required|string|max:2000',
        ]);
        if ($segnalazione->stato !== 'in_lavorazione') {
            return back()->with('error', 'Solo le segnalazioni in lavorazione possono essere risolte.');
        }
        $segnalazione->stato = 'risolta';
        $segnalazione->nota_risoluzione = $request->nota_risoluzione;
        $segnalazione->save();
        return redirect()->route('admin.segnalazioni')->with('success', 'Segnalazione risolta con successo!');
    }

    public function elimina(Request $request, \App\Models\Segnalazione $segnalazione)
    {
        if (!session('is_admin')) abort(403);
        $segnalazione->delete();
        return back()->with('success', 'Segnalazione eliminata con successo!');
    }
} 