<?php
use Modules\Slideshow\Database\Seeds\SlideshowTableSeeder;
//Products Component
use Components\Products\Database\Seeds\ProductCategoriesTableSeeder;
use Components\Products\Database\Seeds\ProductsTableSeeder;
//Stones Component
use Components\Stones\Database\Seeds\ColorsTableSeeder;
use Components\Stones\Database\Seeds\FontsTableSeeder;
use Components\Stones\Database\Seeds\IconCategoriesTableSeeder;
use Components\Stones\Database\Seeds\IconsTableSeeder;

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
            //Products Component
            $this->call('Components\Products\Database\Seeds\ProductCategoriesTableSeeder');
            $this->call('Components\Products\Database\Seeds\ProductsTableSeeder');
            //Stones Component
            $this->call('Components\Stones\Database\Seeds\ColorsTableSeeder');
            $this->call('Components\Stones\Database\Seeds\FontsTableSeeder');
            $this->call('Components\Stones\Database\Seeds\IconCategoriesTableSeeder');
            $this->call('Components\Stones\Database\Seeds\IconsTableSeeder');
        
	}

}
