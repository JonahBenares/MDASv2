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
        Schema::table('powerplants', function (Blueprint $table) {
            $table->dropColumn('participant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('powerplants', function (Blueprint $table) {
            $table->integer('participant_id')->default(0);
        });
    }
};
