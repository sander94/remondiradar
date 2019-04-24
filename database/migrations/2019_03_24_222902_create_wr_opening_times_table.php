<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWrOpeningTimesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wr_opening_times', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('wr_id');
			$table->text('additional_openingtimes_info', 65535)->nullable();
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
		Schema::drop('wr_opening_times');
	}

}
