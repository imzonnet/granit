<?php namespace Components\Products\Database\Seeder;

use Components\Products\Database\Seeds\ProductCategoriesTableSeeder;
use Components\Products\Database\Seeds\ProductsTableSeeder;

class DatabaseSeeder extends \Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            \Eloquent::unguard();
            $this->call('Components\Products\Database\Seeds\ProductCategoriesTableSeeder');
            $this->call('Components\Products\Database\Seeds\ProductsTableSeeder');
	}

}
