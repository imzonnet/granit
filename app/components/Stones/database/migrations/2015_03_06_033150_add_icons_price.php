<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIconsPrice extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('granit_icons', function(Blueprint $table){
            $table->decimal('price',10,2)->after('customize')->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('granit_icons', function(Blueprint $table) {
            $table->dropColumn('price');
        });
	}

}
