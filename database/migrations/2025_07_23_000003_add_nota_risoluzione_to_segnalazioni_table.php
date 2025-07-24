<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('segnalazioni', function (Blueprint $table) {
            $table->text('nota_risoluzione')->nullable()->after('stato');
        });
    }

    public function down(): void
    {
        Schema::table('segnalazioni', function (Blueprint $table) {
            $table->dropColumn('nota_risoluzione');
        });
    }
}; 