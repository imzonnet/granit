<?php

class MenucategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('menu_categories')->delete();
		$menu_categories = array(
            array(
                    'name'       => 'Public Categories',
                    'alias'      => 'public-categories',
                    'position'   => 'public-top-menu',
                    'description'=> '',
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ),
        );
		DB::table('menu_categories')->insert($menu_categories);
	}

}
