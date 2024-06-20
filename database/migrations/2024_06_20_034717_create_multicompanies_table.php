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
        Schema::create('multicompanies', function (Blueprint $table) {
            $table->integer('main_company_id')->unique();
            $table->integer('sub_company_id');
            $table->string('main_company_name');
            $table->string('sub_company_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multicompanies');
    }
};
