<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            
		Schema::create('attachment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('path');
			$table->string('url');
            $table->string('hash')->nullable();
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
		Schema::drop('attachment');
	}

}
