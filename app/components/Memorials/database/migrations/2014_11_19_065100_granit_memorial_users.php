<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitMemorialUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('granit_memorial_users', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('memorial_id')->unsigned();
                $table->foreign('memorial_id')->references('id')->on('granit_memorials')->onDelete('cascade')->onUpdate('cascade');
        	$table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('granit_memorial_users');
	}

}
