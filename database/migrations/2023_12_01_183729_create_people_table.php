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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("lastname");
            $table->string("nif");
            //En este caso nos intenesa mantenerlos a null aunque se borre una dirección, user o driver
            $table->unsignedBigInteger('direction_id')->nullable();
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
