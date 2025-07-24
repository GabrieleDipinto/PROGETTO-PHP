<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Modifica enum stato per aggiungere 'in_lavorazione'
        DB::statement("ALTER TABLE prenotazioni MODIFY stato ENUM('in_attesa', 'in_lavorazione', 'confermata', 'completata', 'annullata') DEFAULT 'in_attesa'");
    }

    public function down(): void {
        // Torna ai valori originali
        DB::statement("ALTER TABLE prenotazioni MODIFY stato ENUM('in_attesa', 'confermata', 'completata', 'annullata') DEFAULT 'in_attesa'");
    }
}; 