<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('text');
            $table->string('price');
            $table->string('link');

            $table->integer('attachment_id')->unsigned()->index()->nullable();
            $table->foreign('attachment_id')->references('id')->on('attachment')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specials');
	}

}
