<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpTranslates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('translates', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ref_id');
            $table->string('module');
            $table->string('field');
            $table->string('content');
            $table->string('language');
            $table->timestamps();
            $table->unique(['ref_id', 'module', 'field', 'language']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exp_translates');
	}

}
