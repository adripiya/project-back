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
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->string("street");
            $table->string("number");
            $table->string("floor");

            //En este caso nos intenesa mantenerlos a null aunque se borre un CP o una ciudad
            $table->unsignedBigInteger('postal_code_id')->nullable();
            $table->foreign('postal_code_id')->references('id')->on('postal_codes')->onDelete('set null');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directions');
    }
};
