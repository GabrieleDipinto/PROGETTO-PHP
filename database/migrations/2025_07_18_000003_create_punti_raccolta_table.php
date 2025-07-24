<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('punti_raccolta', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('via', 100);
            $table->string('civico', 10);
            $table->string('cap', 10);
            $table->decimal('latitudine', 10, 8);
            $table->decimal('longitudine', 11, 8);
            $table->string('orario_apertura', 50)->nullable();
            $table->string('orario_chiusura', 50)->nullable();
            $table->string('tipo_rifiuto', 50);
            $table->enum('stato', ['aperto', 'chiuso'])->default('aperto');
        });
    }

    public function down(): void {
        Schema::dropIfExists('punti_raccolta');
    }
};
