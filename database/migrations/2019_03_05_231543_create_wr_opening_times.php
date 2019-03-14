<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWrOpeningTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wr_opening_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('workroom_id');
            $table->integer('mon_from');
            $table->integer('mon_to');
            $table->integer('tue_from');
            $table->integer('tue_to');
            $table->integer('wed_from');
            $table->integer('wed_to');
            $table->integer('thu_from');
            $table->integer('thu_to');
            $table->integer('fri_from');
            $table->integer('fri_to');
            $table->integer('sat_from');
            $table->integer('sat_to');
            $table->integer('sun_from');
            $table->integer('sun_to');
            $table->text('additional_openingtimes_info');
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
        Schema::dropIfExists('wr_opening_times');
    }
}
