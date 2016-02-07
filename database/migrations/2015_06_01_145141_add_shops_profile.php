<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShopsProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('shop_profiles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('phone', 12)->nullable();
            $table->string('email')->nullable();
            $table->text('description');


        });

		Schema::table('shops', function(Blueprint $table)
		{
			$table->integer('profile_id')->index()->unsigned();
            $table->foreign('profile_id')->references('id')->on('shop_profiles')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('shops', function(Blueprint $table)
		{
			//
		});
	}

}
