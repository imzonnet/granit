<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitMemorials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('granit_memorials', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name', 45);
                $table->string('avatar', 45);
                $table->dateTime('birthday');
                $table->dateTime('death');
                $table->text('biography');
                $table->text('obituary');
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
		Schema::drop('granit_memorials');
	}

}
