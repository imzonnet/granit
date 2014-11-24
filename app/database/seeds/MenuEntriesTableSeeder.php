<?php

/**
* 
*/
class MenuEntriesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('menus')->delete();
		$menu_cat = MenuCategory::first()->id;
		$menu_pos = MenuPosition::first()->id;

		$data = array(
                    array(
                            'title' => 'Products',
                            'alias' => 'product',
                            'link' => 'products',
                            'category' => $menu_cat,
                            'position' => $menu_pos,
                            'same_window' => 1,
                            'show_image' => 1,
                            'is_wrapper' => 0,
                            'status' => 'published',
                            'parent' => 0,
                            'order' => 0,
                            'target' => 'public',
                            'language_id' => 0,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                    ),
                    array(
                            'title' => 'Design',
                            'alias' => 'design',
                            'link' => 'design',
                            'category' => $menu_cat,
                            'position' => $menu_pos,
                            'same_window' => 1,
                            'show_image' => 1,
                            'is_wrapper' => 0,
                            'status' => 'published',
                            'parent' => 0,
                            'order' => 0,
                            'target' => 'public',
                            'language_id' => 0,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                    ),
                    array(
                            'title' => 'Memorials',
                            'alias' => 'memorial',
                            'link' => 'memorial',
                            'category' => $menu_cat,
                            'position' => $menu_pos,
                            'same_window' => 1,
                            'show_image' => 1,
                            'is_wrapper' => 0,
                            'status' => 'published',
                            'parent' => 0,
                            'order' => 0,
                            'target' => 'public',
                            'language_id' => 0,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                    ),
                    array(
                            'title' => 'Blog',
                            'alias' => 'blog',
                            'link' => 'posts',
                            'category' => $menu_cat,
                            'position' => $menu_pos,
                            'same_window' => 1,
                            'show_image' => 1,
                            'is_wrapper' => 0,
                            'status' => 'published',
                            'parent' => 0,
                            'order' => 0,
                            'target' => 'public',
                            'language_id' => 0,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                    ),
                    array(
                            'title' => 'Contact Us',
                            'alias' => 'contact-us',
                            'link' => 'pages/contact',
                            'category' => $menu_cat,
                            'position' => $menu_pos,
                            'same_window' => 1,
                            'show_image' => 1,
                            'is_wrapper' => 0,
                            'status' => 'published',
                            'parent' => 0,
                            'order' => 0,
                            'target' => 'public',
                            'language_id' => 0,
                            'created_at' => date('Y-m-d'),
                            'updated_at' => date('Y-m-d')
                    ),
		);
		DB::table('menus')->insert($data);

	}
}