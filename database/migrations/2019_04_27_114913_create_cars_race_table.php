<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_race', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->bigInteger('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races');
            $table->integer('position')->default(0);
            $table->string('state')->default('??');
            $table->string('current_driver')->nullable();
            $table->string('gap_to_leader')->nullable();
            $table->string('last_lap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars_race');
    }
}
