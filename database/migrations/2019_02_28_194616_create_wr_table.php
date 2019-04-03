<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('brand_name');
            $table->string('brand_logo');
            $table->string('full_address');
            $table->text('additional_info');
            $table->text('detailed_info');
            $table->string('region');
            $table->string('email');
            $table->string('phone');
            $table->string('website_url');
            $table->string('facebook_url');
            $table->string('instagram_url');   
            $table->text('cars_serviced');
            $table->integer('is_active');
            $table->integer('is_verified');
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
        Schema::dropIfExists('wr');
    }
}
