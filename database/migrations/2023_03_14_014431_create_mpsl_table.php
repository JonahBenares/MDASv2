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
        Schema::create('mpsl', function (Blueprint $table) {
            $table->id();
            $table->string('mkt_type')->nullable();
            $table->dateTime('run_time')->nullable();
            $table->integer('run_hour')->default(0);
            $table->dateTime('time_interval')->nullable();
            $table->string('region_name')->nullable();
            $table->foreignId('grid_id')->constrained('grid');
            $table->string('resource_name')->nullable();
            $table->foreignId('resource_id')->references('id')->on('pp_resource');
            $table->string('resource_type')->nullable();
            $table->foreignId('resource_type_id')->references('id')->on('resource_type');
            $table->float('schedule_mw', 10,4)->default(0);
            $table->float('lmp', 10,4)->default(0);
            $table->float('loss_factor', 10,4)->default(0);
            $table->float('lmp_smp', 10,4)->default(0);
            $table->float('lmp_loss', 10,4)->default(0);
            $table->float('congestion', 10,4)->default(0);
            $table->integer('upload_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpsl');
    }
};
