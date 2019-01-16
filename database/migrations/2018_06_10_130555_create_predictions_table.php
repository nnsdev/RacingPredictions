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
            $table->integer('dpi_id')->unsigned();
            $table->foreign('dpi_id')->references('id')->on('cars');
            $table->boolean('dpi_correct')->default(false);
            $table->integer('lmp2_id')->unsigned();
            $table->foreign('lmp2_id')->references('id')->on('cars');
            $table->boolean('lmp2_correct')->default(false);
            $table->integer('gtelm_id')->unsigned();
            $table->foreign('gtelm_id')->references('id')->on('cars');
            $table->boolean('gtelm_correct')->default(false);
            $table->integer('gtd_id')->unsigned();
            $table->foreign('gtd_id')->references('id')->on('cars');
            $table->boolean('gtd_correct')->default(false);
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
