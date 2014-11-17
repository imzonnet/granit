<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitIconCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_icon_categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('image');
			$table->text('description');
			$table->string('status');
			$table->integer('ordering');
			$table->integer('created_by')->unsigned();
			$table->foreign('created_by')->references('id')->on('users');
			$table->integer('parent_id')->unsigned();
			$table->foreign('parent_id')->references('id')->on('granit_icon_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('granit_icon_categories');
	}

}
