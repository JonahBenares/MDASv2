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
            $table->integer('outages_type')->default(0)->after("identifier");
            $table->text('remarks')->nullable()->after("outages_type");
            $table->integer('outage')->default(0)->after("remarks");
            $table->integer('addded_by')->default(0)->after("outage");
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
