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
            $table->integer('user_id')->unique();
            $table->integer('company_id');
            $table->integer('area_id');
            $table->string('area_name');
            $table->integer('post_id');
            $table->string('post_name');
            $table->string('role');
            $table->string('user_name');
            $table->string('company_name');

            $table->foreign('company_id')->references('main_company_id')->on('multicompanies')->onDelete('cascade');
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