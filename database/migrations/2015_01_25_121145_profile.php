<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('profiles', function(Blueprint $table){
            
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->string('last_name');
                $table->string('phone', 12)->nullable();

                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->integer('city_id')->unsigned()->index()->nullable();
                $table->foreign('city_id')->references('id')->on('cities');

                $table->string('vkcom')->nullable();
                
                $table->integer('attachment_id')->unsigned()->index()->nullable();
                $table->foreign('attachment_id')->references('id')->on('profile_attachment');
                
                $table->text('about');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('profiles');
	}

}
