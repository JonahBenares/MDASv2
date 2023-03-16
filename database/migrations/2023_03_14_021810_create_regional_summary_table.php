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
        Schema::create('regional_summary', function (Blueprint $table) {
            $table->id();
            $table->dateTime('run_time')->nullable();
            $table->string('mkt_type')->nullable();
            $table->dateTime('time_interval')->nullable();
            $table->string('region_name')->nullable();
            $table->foreignId('grid_id')->references('id')->on('grid');
            $table->string('commodity_type')->nullable();
            $table->foreignId('commodity_id')->references('id')->on('commodity');
            $table->float('demand', 10,4)->default(0);
            $table->float('generation', 10,4)->default(0);
            $table->float('losses', 10,4)->default(0);
            $table->float('import', 10,4)->default(0);
            $table->float('export', 10,4)->default(0);
            $table->float('load_bid', 10,4)->default(0);
            $table->float('load_curtailed', 10,4)->default(0);
            $table->integer('upload_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regional_summary');
    }
};
