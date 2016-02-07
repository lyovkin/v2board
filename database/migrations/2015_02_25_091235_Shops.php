<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class Shops extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shops', function (Blueprint $table) {

			$table->increments('id');

			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

			$table->integer('shop_category_id')->unsigned()->index()->nullable();
			$table->foreign('shop_category_id')->references('id')->on('shop_category')->onDelete('cascade');

            $table->smallInteger('capacity');

			$table->integer('attachment_id')->unsigned()->index()->nullable();
			$table->foreign('attachment_id')->references('id')->on('attachment')->onDelete('cascade');

            $table->smallInteger('blocked')->unsigned();

            $table->timestamp('paid_at');

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
		Schema::drop('shops');
	}

}
