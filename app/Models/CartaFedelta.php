<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaFedelta extends Model
{
    use HasFactory;

    protected $table = 'carte_fedelta';
    public $timestamps = false;

    protected $fillable = [
        'id_utente',
        'punti_accumulati',
        'data_attivazione',
        'data_scadenza'
    ];

    protected $casts = [
        'data_attivazione' => 'date',
        'data_scadenza' => 'date'
    ];

    public function utente()
    {
        return $this->belongsTo(User::class, 'id_utente');
    }

    public function isAttiva()
    {
        return $this->data_attivazione !== null && 
               $this->data_scadenza !== null && 
               now()->between($this->data_attivazione, $this->data_scadenza);
    }

    public function aggiungiPunti($punti)
    {
        $this->punti_accumulati += $punti;
        $this->save();
    }
} 