<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitGuestbooks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_guestbooks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 45);
            $table->text('content');
            $table->integer('memorial_id')->unsigned();
            $table->foreign('memorial_id')->references('id')->on('granit_memorials')->onDelete('cascade')->onUpdate('cascade');
        	$table->integer('create_by')->unsigned();
			$table->foreign('create_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('granit_guestbooks');
	}

}
