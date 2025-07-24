<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::create('utenti', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('cognome', 50);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('telefono', 20);
            $table->string('via', 100);
            $table->string('civico', 10);
            $table->string('cap', 10);
            $table->integer('eta');
            $table->date('data_registrazione')->default(DB::raw('CURRENT_DATE'));
            $table->enum('ruolo', ['utente', 'admin'])->default('utente');
            // Campi richiesti da Laravel per l'autenticazione
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('utenti');
    }
};
