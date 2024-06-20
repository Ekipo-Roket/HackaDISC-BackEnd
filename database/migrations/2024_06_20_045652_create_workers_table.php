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
        Schema::create('workers', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('post_id');
            $table->string('post_name');
            $table->string('role');
            $table->string('user_name');
            $table->foreignId('stat_id')->constrained('stats');
            $table->foreignId('company_id')->constrained('multicompanies');
            $table->foreignId('area_id')->constrained('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
