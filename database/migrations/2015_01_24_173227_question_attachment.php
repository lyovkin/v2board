<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionAttachment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('question_attachment', function(Blueprint $table){
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('path');
                $table->string('url');
                $table->string('hash')->index()->references('attachment_hash')->on('questions');
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
