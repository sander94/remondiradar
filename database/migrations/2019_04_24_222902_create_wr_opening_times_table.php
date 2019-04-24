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
			$table->integer('mon_from')->nullable();
			$table->integer('mon_to')->nullable();
			$table->integer('tue_from')->nullable();
			$table->integer('tue_to')->nullable();
			$table->integer('wed_from')->nullable();
			$table->integer('wed_to')->nullable();
			$table->integer('thu_from')->nullable();
			$table->integer('thu_to')->nullable();
			$table->integer('fri_from')->nullable();
			$table->integer('fri_to')->nullable();
			$table->integer('sat_from')->nullable();
			$table->integer('sat_to')->nullable();
			$table->integer('sun_from')->nullable();
			$table->integer('sun_to')->nullable();
			$table->integer('mon_opt')->nullable();
			$table->integer('tue_opt')->nullable();
			$table->integer('wed_opt')->nullable();
			$table->integer('thu_opt')->nullable();
			$table->integer('fri_opt')->nullable();
			$table->integer('sat_opt')->nullable();
			$table->integer('sun_opt')->nullable();
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
