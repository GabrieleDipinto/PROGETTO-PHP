<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prenotazione;
use Illuminate\Http\Request;

class PrenotazioniAdminController extends Controller
{
    public function index()
    {
        if (!session('is_admin')) abort(403);
        $prenotazioni = Prenotazione::orderBy('created_at', 'desc')->get();
        return view('admin.prenotazioni', compact('prenotazioni'));
    }

    public function approva(Request $request, Prenotazione $prenotazione)
    {
        if (!session('is_admin')) abort(403);
        if ($prenotazione->stato !== 'in_attesa') {
            return back()->with('error', 'Solo le prenotazioni in attesa possono essere approvate.');
        }
        $prenotazione->stato = 'in_lavorazione';
        $prenotazione->save();
        return back()->with('success', 'Prenotazione approvata e messa in lavorazione!');
    }

    public function elimina(Request $request, \App\Models\Prenotazione $prenotazione)
    {
        if (!session('is_admin')) abort(403);
        $prenotazione->delete();
        return back()->with('success', 'Prenotazione eliminata con successo!');
    }
} 