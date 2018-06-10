<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lmp1_id')->unsigned();
            $table->foreign('lmp1_id')->references('id')->on('cars');
            $table->boolean('lmp1_correct')->default(false);
            $table->integer('lmp2_id')->unsigned();
            $table->foreign('lmp2_id')->references('id')->on('cars');
            $table->boolean('lmp2_correct')->default(false);
            $table->integer('gtepro_id')->unsigned();
            $table->foreign('gtepro_id')->references('id')->on('cars');
            $table->boolean('gtepro_correct')->default(false);
            $table->integer('gteam_id')->unsigned();
            $table->foreign('gteam_id')->references('id')->on('cars');
            $table->boolean('gteam_correct')->default(false);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('predictions');
    }
}
