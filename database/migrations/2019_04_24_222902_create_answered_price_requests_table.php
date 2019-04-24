<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnsweredPriceRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answered_price_requests', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('request_id');
			$table->integer('answered_by');
			$table->text('answer', 65535);
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
		Schema::drop('answered_price_requests');
	}

}
