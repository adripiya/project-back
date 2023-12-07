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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string("license")->unique();
            $table->string("name");
            $table->integer("waiters");
            $table->integer("maxPeople");
            $table->integer("minPeople");
            $table->decimal("pricePerPerson", 10, 2);

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
        Schema::dropIfExists('restaurants');
    }
};
