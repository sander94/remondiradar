<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeslots', function (Blueprint $table) {
            $table->increments('id');
            $table->time('from');
            $table->time('to');
            $table->char('open_type');
            $table->char('day_of_week');
            $table->unsignedBigInteger('workroom_id')->index();
            $table->foreign('workroom_id')
                ->references('id')
                ->on('wr');
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
        Schema::drop('timeslots');
    }
}
