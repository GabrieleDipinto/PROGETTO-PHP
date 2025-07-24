<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('segnalazioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utente')->constrained('utenti')->onDelete('cascade');
            $table->string('tipo', 50);
            $table->text('descrizione');
            $table->string('via', 100);
            $table->string('civico', 10);
            $table->string('cap', 10);
            $table->string('immagine')->nullable();
            $table->enum('stato', ['in_attesa', 'in_lavorazione', 'risolta', 'chiusa'])->default('in_attesa');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('segnalazioni');
    }
};
