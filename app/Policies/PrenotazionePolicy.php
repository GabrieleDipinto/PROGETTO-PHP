<?php

namespace App\Policies;

use App\Models\Prenotazione;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class PrenotazionePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Prenotazione $prenotazione): bool
    {
        Log::info('PrenotazionePolicy@view', [
            'user_id' => $user->id,
            'prenotazione_user_id' => $prenotazione->id_utente,
            'prenotazione' => $prenotazione->toArray()
        ]);
        
        return $user->id === $prenotazione->id_utente;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Prenotazione $prenotazione): bool
    {
        return $user->id === $prenotazione->id_utente && $prenotazione->stato === 'in_attesa';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Prenotazione $prenotazione): bool
    {
        Log::info('PrenotazionePolicy@delete', [
            'user_id' => $user->id,
            'prenotazione_user_id' => $prenotazione->id_utente,
            'prenotazione_stato' => $prenotazione->stato,
            'prenotazione' => $prenotazione->toArray()
        ]);

        // Verifichiamo prima se l'utente è il proprietario
        $isOwner = $user->id === $prenotazione->id_utente;
        Log::info('PrenotazionePolicy@delete - isOwner check', ['isOwner' => $isOwner]);

        // Verifichiamo se la prenotazione è in attesa
        $isInAttesa = $prenotazione->stato === 'in_attesa';
        Log::info('PrenotazionePolicy@delete - isInAttesa check', ['isInAttesa' => $isInAttesa]);

        // Ritorniamo true solo se entrambe le condizioni sono vere
        return $isOwner && $isInAttesa;
    }
} 