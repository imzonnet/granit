<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitDesigns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('granit_designs', function(Blueprint $table) {
			$table->increments('id');
			$table->text('image');
			$table->longText('data');
			$table->string('status');
            $table->integer('ordering')->default(0);
            // $table->integer('created_by')->unsigned();
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('granit_designs');
	}

}
