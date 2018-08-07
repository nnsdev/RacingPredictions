<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_race', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->string('position')->default(0);
            $table->string('state')->default('IN');
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
        Schema::dropIfExists('car_race');
    }
}
