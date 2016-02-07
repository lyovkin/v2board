<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryAttachmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery_attachments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->integer('gallery_id')->unsigned()->index()->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries');
            $table->string('name')->nullable();
            $table->string('path');
            $table->string('url');
            $table->string('link');
            $table->string('comment')->nullable();
            $table->string('hash')->index()->references('attachment_hash')->on('galleries');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gallery_attachments');
	}

}
