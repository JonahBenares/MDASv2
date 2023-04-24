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
        Schema::table('mpsl_temp', function (Blueprint $table) {
            $table->integer('pp_type_id')->default(0)->after("resource_type_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mpsl_temp', function (Blueprint $table) {
            //
        });
    }
};
