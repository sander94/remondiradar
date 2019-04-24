<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name')->unique('name');
			$table->string('email')->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->string('reg_no')->nullable();
			$table->string('vat_no')->nullable();
			$table->string('phone')->nullable();
			$table->string('legal_address')->nullable();
			$table->string('website')->nullable();
			$table->integer('pricerequest_email_to_user')->default(1);
			$table->integer('is_active')->nullable()->default(1);
			$table->string('invoice_amount')->nullable()->default('0');
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
		Schema::drop('users');
	}

}
