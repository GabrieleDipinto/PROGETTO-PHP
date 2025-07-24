<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('carte_fedelta', function (Blueprint $table) {
            $table->float('saldo_euro', 8, 2)->default(0)->after('punti_accumulati');
        });
    }

    public function down(): void {
        Schema::table('carte_fedelta', function (Blueprint $table) {
            $table->dropColumn('saldo_euro');
        });
    }
}; 