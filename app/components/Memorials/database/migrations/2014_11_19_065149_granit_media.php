<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitMedia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('granit_memorial_media', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->enum('media_type', array('image', 'audio', 'video'))->default('image');
                $table->string('image');
                $table->string('url');
                $table->integer('memorial_id')->unsigned();
                $table->foreign('memorial_id')->references('id')->on('granit_memorials')->onDelete('cascade')->onUpdate('cascade');
        	$table->integer('created_by')->unsigned();
                $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        	$table->string('status')->default('published');
        	$table->integer('ordering');
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
		Schema::drop('granit_memorial_media');
	}

}
