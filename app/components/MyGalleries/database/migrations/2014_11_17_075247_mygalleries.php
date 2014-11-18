<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mygalleries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mygalleries', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('alias')->unique();
			$table->text('description');
			$table->integer('cat_id')->unsigned();
			$table->foreign('cat_id')->references('id')->on('mygallery_categories')->onDelete('cascade')->onUpdate('cascade');
			$table->text('images');
			$table->string('status')->default('published');
			$table->integer('ordering');
			$table->integer('created_by')->unsigned();
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('mygalleries');
	}

}
