<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdsAttachment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('ads_attachment', function(Blueprint $table){
                $table->increments('id');
                $table->integer('ads_id')->unsigned()->index()->nullable();
                $table->foreign('ads_id')->references('id')->on('advertisement');
                $table->string('name')->nullable();
                $table->string('path');
                $table->string('url');
                $table->string('comment')->nullable();
                $table->string('hash')->index()->references('attachment_hash')->on('advertisement');
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
