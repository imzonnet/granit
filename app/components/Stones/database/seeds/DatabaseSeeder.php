<?php namespace Components\Stones\Database\Seeder;

use Components\Stones\Database\Seeds\ColorsTableSeeder;
use Components\Stones\Database\Seeds\FontsTableSeeder;
use Components\Stones\Database\Seeds\IconCategoriesTableSeeder;
use Components\Stones\Database\Seeds\IconsTableSeeder;

class DatabaseSeeder extends \Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            \Eloquent::unguard();
            $this->call('Components\Stones\Database\Seeds\ColorsTableSeeder');
            $this->call('Components\Stones\Database\Seeds\FontsTableSeeder');
            $this->call('Components\Stones\Database\Seeds\IconCategoriesTableSeeder');
            $this->call('Components\Stones\Database\Seeds\IconsTableSeeder');
	}

}
