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
        Schema::create('powerplants', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name')->nullable();
            $table->foreignId('powerplant_type_id')->constrained('pp_type');
            $table->foreignId('subtype_id')->constrained('pp_subtype');
            $table->string('operator')->nullable();
            $table->integer('participant_id')->default(0);
            $table->string('short_name')->nullable();
            $table->foreignId('region_id')->constrained('region');
            $table->string('municipality')->nullable();
            $table->foreignId('grid_id')->constrained('grid');
            $table->float('capacity_installed', 10,4)->default(0);
            $table->float('capacity_dependable', 10,4)->default(0);
            $table->integer('number_of_units')->default(0);
            $table->string('ippa')->nullable();
            $table->string('fit_approved')->nullable();
            $table->string('owner_type')->nullable();
            $table->string('type_of_contract')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('powerplants');
    }
};
