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
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('area_id');
            $table->integer('area_name');
            $table->integer('post_id');
            $table->integer('post_name');
            $table->integer('user_name');
            $table->integer('company_name');
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
