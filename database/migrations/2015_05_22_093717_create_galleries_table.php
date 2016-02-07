<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('slug');
            $table->unique('slug');

            $table->string('title');
            $table->text('article');
            $table->text('description');
            $table->text('tags');
            $table->smallInteger('columns');
            $table->string('attachment_hash')->index()->references('hash')->on('gallery_attachments')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('galleries');
	}

}
