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
            $table->id()->unique();
            $table->string('user_name');
            $table->foreignId('role_id')->constrained('roles');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('post_id');
            $table->foreignId('company_id')->constrained('multicompanies');
            $table->foreignId('area_id')->constrained('areas');
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
