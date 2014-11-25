<?php

use Faker\Factory as Faker;

class MenuEntriesTableSeeder extends Seeder {

    public function run() {
        DB::table('menus')->delete();
        $menu_cat = MenuCategory::first()->id;
        $menu_pos = MenuPosition::first()->id;
        $faker = Faker::create();
        $data = array(
            array(
                'title' => 'Home',
                'alias' => 'home',
                'link' => 'home',
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
        /*
          $menu_cat = MenuCategory::first()->id;
          $positions = array();
          foreach (MenuPosition::all() as $menu) {
          $positions[] = $menu->id;
          }
          unset($positions[0]);
          array_values($positions);
          foreach (range(0, 10) as $index) {
          $name = $faker->name;
          $slig = \Str::slug($name);
          DB::table('menus')->insert(array(
          'title' => $name,
          'alias' => $slig,
          'link' => '#',
          'category' => $menu_cat,
          'position' => $positions[array_rand($positions)],
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
          ));
          }
         * 
         */
    }

}
