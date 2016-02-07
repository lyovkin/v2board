<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('comments', function(Blueprint $table){
            
                $table->increments('id');
                $table->string('text');

                $table->integer('ads_id')->unsigned()->index()->nullable();
                $table->foreign('ads_id')->references('id')->on('advertisement')->onDelete('cascade');

				$table->integer('user_id')->unsigned()->index()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('comments');
	}

}
