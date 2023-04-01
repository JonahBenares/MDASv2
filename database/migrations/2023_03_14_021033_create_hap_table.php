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
        Schema::create('hap', function (Blueprint $table) {
            $table->id();
            $table->dateTime('run_time')->nullable();
            $table->dateTime('interval_end')->nullable();
            $table->string('price_node')->nullable();
            $table->integer('price_node_id')->default(0);
            $table->float('mw', 10,4)->default(0);
            $table->float('lmp', 10,4)->default(0);
            $table->float('loss_factor', 10,4)->default(0);
            $table->float('energy', 10,4)->default(0);
            $table->float('loss', 10,4)->default(0);
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
        Schema::dropIfExists('hap');
    }
};
