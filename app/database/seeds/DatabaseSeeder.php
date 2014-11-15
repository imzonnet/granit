<?php

use Modules\Slideshow\Database\seeds\SlideshowTableSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->call('SentrySeeder');
        $this->call('FormCategoriesTableSeeder');
        $this->call('MenucategoriesTableSeeder');
        $this->call('MenuPositionTableSeeder');
        $this->call('MenuEntriesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('ThemesTableSeeder');
        $this->call('Modules\Slideshow\Database\seeds\SlideshowTableSeeder');
	}

}
