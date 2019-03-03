<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesShopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('categories_shops', function(Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('items_category');

            $table->unsignedInteger('shop_id')->nullable();
            $table->foreign('shop_id')->references('id')->on('shops');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories_shops');
	}

}
