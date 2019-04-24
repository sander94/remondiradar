<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wr', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('company_id');
			$table->string('brand_name')->nullable()->default('');
			$table->string('brand_logo')->nullable();
			$table->string('full_address')->nullable();
			$table->string('google_maps')->nullable();
			$table->text('short_description', 65535)->nullable();
			$table->text('additional_info', 65535)->nullable();
			$table->string('region')->nullable()->default('');
			$table->string('email')->nullable()->default('');
			$table->string('phone')->nullable()->default('');
			$table->string('website_url')->nullable()->default('');
			$table->string('facebook_url')->nullable()->default('');
			$table->string('instagram_url')->nullable()->default('');
			$table->text('cars_serviced', 65535)->nullable();
			$table->integer('view_count')->nullable()->default(0);
			$table->string('is_active', 32)->nullable()->default('0');
			$table->string('is_verified', 32)->nullable()->default('0');
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
		Schema::drop('wr');
	}

}
