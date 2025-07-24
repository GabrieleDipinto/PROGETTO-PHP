<?php

namespace App\Policies;

use App\Models\Segnalazione;
use App\Models\User;

class SegnalazionePolicy
{
    /**
     * Determine whether the user can update the segnalazione.
     */
    public function update(User $user, Segnalazione $segnalazione): bool
    {
        return $user->id === $segnalazione->id_utente && $segnalazione->stato === 'in_attesa';
    }

    /**
     * Determine whether the user can view the segnalazione.
     */
    public function view(User $user, Segnalazione $segnalazione): bool
    {
        return $user->id === $segnalazione->id_utente;
    }
} 