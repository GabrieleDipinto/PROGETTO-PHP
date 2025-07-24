<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    use HasFactory;

    protected $table = 'prenotazioni';

    protected $fillable = [
        'id_utente',
        'tipo_rifiuto',
        'quantita',
        'data_ritiro',
        'note',
        'stato'
    ];

    protected $casts = [
        'data_ritiro' => 'date',
        'quantita' => 'decimal:2'
    ];

    public function utente()
    {
        return $this->belongsTo(User::class, 'id_utente');
    }
} 