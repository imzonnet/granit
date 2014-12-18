<?php

use Faker\Factory as Faker;

class MenuEntriesTableSeeder extends Seeder {

    public function run() {
        DB::table('menus')->delete();
        $menu_cat = MenuCategory::first()->id;
        $menu_pos1 = MenuPosition::where('alias', '=', 'public-top-menu')->first()->id;
        $menu_pos2 = MenuPosition::where('alias', '=', 'public-bottom-menu')->first()->id;
        $faker = Faker::create();
        $data = array(
            array(
                'title' => 'Home',
                'alias' => 'home',
                'link' => 'home',
                'category' => $menu_cat,
                'position' => $menu_pos1,
                'icon' => 'uploads/images/icons/home.png',
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
                'title' => 'About Us',
                'alias' => 'about-us',
                'link' => 'about-us',
                'category' => $menu_cat,
                'position' => $menu_pos1,
                'icon' => 'uploads/images/icons/about.png',
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
                'position' => $menu_pos1,
                'icon' => 'uploads/images/icons/product.png',
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
                'position' => $menu_pos1,
                'icon' => 'uploads/images/icons/design.png',
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
                'position' => $menu_pos1,
                'icon' => 'uploads/images/icons/memorial.png',
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
                'position' => $menu_pos1,
                'icon' => 'uploads/images/icons/about.png',
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
        
        //footer menu
        $data = array(
            array(
                'title' => 'Home',
                'alias' => 'home-0',
                'link' => 'home',
                'category' => $menu_cat,
                'position' => $menu_pos2,
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
                'title' => 'About Us',
                'alias' => 'about-us-0',
                'link' => 'about-us',
                'category' => $menu_cat,
                'position' => $menu_pos2,
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
                'alias' => 'product-0',
                'link' => 'products',
                'category' => $menu_cat,
                'position' => $menu_pos2,
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
                'alias' => 'design-0',
                'link' => 'design',
                'category' => $menu_cat,
                'position' => $menu_pos2,
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
                'alias' => 'memorial-0',
                'link' => 'memorial',
                'category' => $menu_cat,
                'position' => $menu_pos2,
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
                'alias' => 'contact-us-0',
                'link' => 'pages/contact',
                'category' => $menu_cat,
                'position' => $menu_pos2,
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
