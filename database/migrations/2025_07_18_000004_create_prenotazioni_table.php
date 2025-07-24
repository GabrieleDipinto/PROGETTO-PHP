<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('prenotazioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utente')->constrained('utenti')->onDelete('cascade');
            $table->string('tipo_rifiuto', 50);
            $table->decimal('quantita', 8, 2);
            $table->date('data_ritiro');
            $table->text('note')->nullable();
            $table->enum('stato', ['in_attesa', 'confermata', 'completata', 'annullata'])->default('in_attesa');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('prenotazioni');
    }
};
