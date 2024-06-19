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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('adaptability_to_change');
            $table->integer('safe_conduct');
            $table->integer('dynamsim_energy');
            $table->integer('personal_effectiveness');
            $table->integer('initiative');
            $table->integer('working_under_pressure');
            $table->integer('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
