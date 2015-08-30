<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpBlocks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('exp_blocks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('info');
            $table->string('region');
            $table->tinyInteger('visibility')->default(0);
            $table->text('pages');
            $table->integer('order')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
        \Schema::create('exp_block_translates', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description');
            $table->string('language')->default('en');
            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('exp_blocks')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->unique(['block_id', 'language']);
            $table->index(['block_id', 'language']);
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        \Schema::drop('exp_block_translates');
        \Schema::drop('exp_blocks');
	}

}
