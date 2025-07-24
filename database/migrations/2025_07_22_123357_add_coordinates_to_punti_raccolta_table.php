<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('punti_raccolta', function (Blueprint $table) {
            $table->decimal('latitudine', 10, 8)->after('cap');
            $table->decimal('longitudine', 11, 8)->after('latitudine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('punti_raccolta', function (Blueprint $table) {
            $table->dropColumn(['latitudine', 'longitudine']);
        });
    }
};
