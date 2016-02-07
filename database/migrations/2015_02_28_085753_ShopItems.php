<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class ShopItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop_items', function (Blueprint $table) {

			$table->increments('id');
			$table->string('name');
            $table->integer('art_number');

			$table->string('description');
			$table->integer('price');

			$table->integer('attachment_id')->unsigned()->index()->nullable();
			$table->foreign('attachment_id')->references('id')->on('attachment')->onDelete('cascade');

			$table->integer('shop_id')->unsigned()->index();
			$table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');

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
		//
	}

}
