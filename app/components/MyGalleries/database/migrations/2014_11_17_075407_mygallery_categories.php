<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MygalleryCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mygallery_categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('alias')->unique();
			$table->string('image')->nullable();
			$table->text('description');
			$table->string('status', 20)->default('published');
			$table->integer('ordering')->default(0);
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
		Schema::drop('mygallery_categories');
	}

}
