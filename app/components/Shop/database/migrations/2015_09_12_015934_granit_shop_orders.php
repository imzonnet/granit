<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GranitShopOrders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('granit_shop_orders', function(Blueprint $table) {
            $table->increments('id');
            $table->string('order_code');
            $table->string('status');
            $table->text('customer_message');
            $table->longText('products');
            $table->longText('user_info');
            $table->longText('extra_fields');
            $table->integer('total_price');
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
		//
		Schema::drop('granit_shop_orders');
	}

}
