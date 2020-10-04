<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPivotForServiceWr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_work_room', function (Blueprint $table) {
            $table->unsignedInteger('service_id')->index();
            $table->unsignedInteger('wr_id')->index();

            $table->primary(['wr_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_work_room', function (Blueprint $table) {
            //
        });
    }
}
