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
            $table->foreignId('user_id')->constrained('workers');
            $table->float('adaptability_to_change');
            $table->float('safe_conduct');
            $table->float('dynamsim_energy');
            $table->float('personal_effectiveness');
            $table->float('initiative');
            $table->float('working_under_pressure');
            $table->dateTime('date');

           
            $table->timestamps();
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
