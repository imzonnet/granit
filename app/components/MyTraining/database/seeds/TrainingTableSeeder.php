<?php
class TrainingTableSeeder extends \Seeder  {
	public function run(){
		DB::table('training')->delete();

        $posts = array(
            array(
                'title'      => 'This is a TITLE ONE',
                'description'=> 'description'
            ),
            array(
                'title'      => 'This is a TITLE TWO',
                'description'=> 'description'
            ),

        );

        DB::table('training')->insert($posts);
	}
}

