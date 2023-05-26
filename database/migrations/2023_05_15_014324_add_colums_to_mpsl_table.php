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
        Schema::table('mpsl', function (Blueprint $table) {
            $table->integer('outages')->default(0)->after("identifier");
            $table->integer('outages_type')->default(0)->after("outages");
            $table->text('remarks')->nullable()->after("outages_type");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mpsl', function (Blueprint $table) {
            //
        });
    }
};
