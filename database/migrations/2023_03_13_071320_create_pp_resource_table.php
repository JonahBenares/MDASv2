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
        Schema::create('pp_resource', function (Blueprint $table) {
            $table->id();
            $table->integer('powerplant_id')->default(0);
            $table->string('resource_id')->nullable();
            $table->string('date_commissioned')->nullable();
            $table->string('hex')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pp_resource');
    }
};
