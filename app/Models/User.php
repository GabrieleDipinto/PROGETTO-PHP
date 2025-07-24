<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utenti';

    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'password',
        'telefono',
        'via',
        'civico',
        'cap',
        'eta',
        'ruolo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'data_registrazione' => 'date',
    ];

    public function prenotazioni()
    {
        return $this->hasMany(Prenotazione::class, 'id_utente');
    }

    public function segnalazioni()
    {
        return $this->hasMany(Segnalazione::class, 'id_utente');
    }

    public function cartaFedelta()
    {
        return $this->hasOne(CartaFedelta::class, 'id_utente');
    }
}
