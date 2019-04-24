<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('price_requests', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('reg_no')->nullable();
			$table->string('make')->nullable();
			$table->string('model')->nullable();
			$table->string('year')->nullable();
			$table->string('engine')->nullable();
			$table->string('kw')->nullable();
			$table->string('gearbox')->nullable();
			$table->string('fuel')->nullable();
			$table->text('additional_info', 65535);
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->integer('region');
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
		Schema::drop('price_requests');
	}

}
