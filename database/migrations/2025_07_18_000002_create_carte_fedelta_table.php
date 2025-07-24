<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('carte_fedelta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utente')->unique()->constrained('utenti')->onDelete('cascade');
            $table->integer('punti_accumulati')->default(0);
            $table->date('data_attivazione')->nullable();
            $table->date('data_scadenza')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('carte_fedelta');
    }
};
