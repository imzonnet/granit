<?php

class MyGalleryCategoriesTableSeeder extends \Seeder {

	public function run()
	{
        DB::table('mygallery_categories')->delete();
        
        $posts = array(
            array(
                'name'      	=> 'Demo Cat One',
                'alias'      	=> 'demo-cat-one',
                'description' 	=> 'The test Categories',
                'created_by'	=> 1
            ),
            array(
                'name'      	=> 'Demo Cat Two',
                'alias'      	=> 'demo-cat-two',
                'description' 	=> 'The test Categories',
                'created_by'	=> 1
            )
        );

        DB::table('mygallery_categories')->insert($posts);
	}

}