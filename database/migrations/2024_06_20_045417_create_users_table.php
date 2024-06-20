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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id')->unique();
            $table->string('user_name');
            $table->string('role');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('company_id');
            $table->integer('area_id');
            $table->integer('post_id');

            $table->foreign('company_id')->references('main_company_id')->on('multicompanies')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
