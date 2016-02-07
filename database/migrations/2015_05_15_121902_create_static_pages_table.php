<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('slug');
            $table->unique('slug');

            $table->string('title');
            $table->text('article');
            $table->text('description');
            $table->text('tags');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('static_pages');
	}

}
