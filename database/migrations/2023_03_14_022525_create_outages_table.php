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
        Schema::create('outages', function (Blueprint $table) {
            $table->id();
            $table->string('outage_date')->nullable();
            $table->integer('outage_interval')->default(0);
            $table->integer('outage_hour')->default(0);
            $table->integer('summary_id')->default(0);
            $table->foreignId('powerplant_type')->references('id')->on('pp_type');
            $table->foreignId('grid_id')->references('id')->on('grid');
            $table->foreignId('resource_id')->references('id')->on('pp_resource');
            $table->float('schedule_mw', 10,4)->default(0);
            $table->integer('outage_type')->default(0);
            $table->text('remark')->nullable();
            $table->integer('added_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outages');
    }
};
