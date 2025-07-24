<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoRaccolta extends Model
{
    use HasFactory;

    protected $table = 'punti_raccolta';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'indirizzo',
        'latitudine',
        'longitudine',
        'orario_apertura',
        'orario_chiusura',
        'stato'
    ];

    public function prenotazioni()
    {
        return $this->hasMany(Prenotazione::class, 'id_punto');
    }
} 