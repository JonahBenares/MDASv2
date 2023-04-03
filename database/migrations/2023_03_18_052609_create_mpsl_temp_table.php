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
        Schema::create('mpsl_temp', function (Blueprint $table) {
            $table->id();
            $table->string('mkt_type')->nullable();
            $table->date('run_time')->nullable();
            $table->integer('run_hour')->default(0);
            $table->dateTime('time_interval')->nullable();
            $table->string('region_name')->nullable();
            $table->integer('grid_id')->default(0);
            $table->string('resource_name')->nullable();
            $table->integer('resource_id')->default(0);
            $table->string('resource_type')->nullable();
            $table->integer('resource_type_id')->default(0);
            $table->float('schedule_mw', 10,4)->default(0);
            $table->float('lmp', 10,4)->default(0);
            $table->float('loss_factor', 10,4)->default(0);
            $table->float('lmp_smp', 10,4)->default(0);
            $table->float('lmp_loss', 10,4)->default(0);
            $table->float('congestion', 10,4)->default(0);
            $table->string('identifier')->nullable();
            $table->integer('upload_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpsl_temp');
    }
};
