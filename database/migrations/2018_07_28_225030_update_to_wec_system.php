<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateToWecSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->integer('race_id')->unsigned()->after('id')->default(1);
            $table->foreign('race_id')->references('id')->on('races');
            $table->integer('points')->after('user_id')->default(0);
            $table->dropColumn('dpi_correct');
            $table->dropColumn('lmp2_correct');
            $table->dropColumn('gtelm_correct');
            $table->dropColumn('gtd_correct');

        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('points');
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('current_driver');
            $table->dropColumn('gap_to_leader');
            $table->dropColumn('last_lap');
            $table->dropColumn('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropColumn('race_id');
            $table->dropColumn('points');
            $table->boolean('dpi_correct')->default(false);
            $table->boolean('lmp2_correct')->default(false);
            $table->boolean('gtelm_correct')->default(false);
            $table->boolean('gtd_correct')->default(false);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('points')->after('avatar')->default(0);
        });
        Schema::table('cars', function (Blueprint $table) {
            $table->string('position')->nullable()->default(null);
            $table->string('state')->nullable()->after('position');
            $table->string('current_driver')->nullable()->after('state');
            $table->string('gap_to_leader')->nullable()->after('current_driver');
            $table->string('last_lap')->nullable()->after('gap_to_leader');
        });

    }
}
