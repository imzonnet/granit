<?php
use Components\MyGalleries\Models\Category; 
class MyGalleriesTableSeeder extends \Seeder {
	
	public function run()
	{
        DB::table('mygalleries')->delete();
        $Cat = Category::all();
        $posts = array(
            array(
                'name'      	=> 'Galleries One',
                'alias'      	=> 'galleries-one',
                'description' 	=> 'The test Galleries',
                'cat_id'		=> $Cat->first()->id,
                'created_by'	=> 1
            ),
            array(
                'name'      	=> 'Galleries Two',
                'alias'      	=> 'galleries-two',
                'description' 	=> 'The test Galleries',
                'cat_id'		=> $Cat->last()->id,
                'created_by'	=> 1
            )
        );

        DB::table('mygalleries')->insert($posts);
	}

}