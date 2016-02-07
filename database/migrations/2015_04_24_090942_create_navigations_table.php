<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('link');
            $table->integer('parent_id')->nullable()->unsigned()->index();
            $table->foreign('parent_id')->references('id')->on('navigations')->onDelete('cascade');
            $table->smallInteger('sort_order');
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
		Schema::drop('navigations');
	}

}
