<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segnalazione extends Model
{
    use HasFactory;

    protected $table = 'segnalazioni';

    protected $fillable = [
        'id_utente',
        'tipo',
        'descrizione',
        'via',
        'civico',
        'cap',
        'immagine',
        'stato'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function utente()
    {
        return $this->belongsTo(User::class, 'id_utente');
    }
} 