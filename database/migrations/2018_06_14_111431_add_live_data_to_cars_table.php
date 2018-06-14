<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLiveDataToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('state')->nullable()->after('position');
            $table->string('current_driver')->nullable()->after('state');
            $table->string('gap_to_leader')->nullable()->after('current_driver');
            $table->string('last_lap')->nullable()->after('gap_to_leader');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('current_driver');
            $table->dropColumn('gap_to_leader');
            $table->dropColumn('last_lap');
        });
    }
}
