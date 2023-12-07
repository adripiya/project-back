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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamp('initial_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer("totalPeople");
            $table->decimal("totalPrice", 12, 2);

            //En este caso nos intenesa mantenerlos a null aunque se borre un user o una asignación de vehículo-conductor
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('restaurant_promoter_id')->nullable();
            $table->foreign('restaurant_promoter_id')->references('id')->on('restaurant_promoters')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
