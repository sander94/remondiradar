<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('wr_id')->nullable();
			$table->string('name')->nullable();
			$table->integer('stars')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->string('reviewer_email')->nullable();
			$table->string('token')->nullable()->index('token');
			$table->integer('is_active')->nullable();
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
		Schema::drop('reviews');
	}

}
