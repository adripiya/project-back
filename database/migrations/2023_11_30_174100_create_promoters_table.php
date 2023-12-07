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
        Schema::create('promoters', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phoneNumber')->nullable();
            //$table->string("state");

            //En este caso nos intenesa mantenerlos a null aunque se borre un user o una asignación de vehículo-conductor
            $table->unsignedBigInteger('person_id')->nullable();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promoters');
    }
};
