<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UtentiAdminController extends Controller
{
    public function index()
    {
        if (!session('is_admin')) abort(403);
        $utenti = User::orderBy('created_at', 'desc')->get();
        return view('admin.utenti', compact('utenti'));
    }

    public function elimina(\Illuminate\Http\Request $request, \App\Models\User $utente)
    {
        if (!session('is_admin')) abort(403);
        $utente->delete();
        return back()->with('success', 'Utente eliminato con successo!');
    }
} 