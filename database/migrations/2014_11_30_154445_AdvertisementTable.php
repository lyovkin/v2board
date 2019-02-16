<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AdvertisementTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('ad_types')->onDelete('cascade');;

            $table->text('text');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');;
            
            $table->string('attachment_hash', 255)->index()->references('hash')->on('ads_attachment')->nullable();

            $table->string('sort_order');
            $table->timestamp('sort_order_update_data');
            $table->bigInteger('phone')->index()->nullable();
            $table->integer('price')->nullable();
            $table->integer('approved')->default('0');
            $table->integer('rating')->unsigned();
            $table->integer('top')->nullable();

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
        Schema::drop('advertisement');
    }

}
