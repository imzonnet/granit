<?php

class ClassTableSeeder extends \Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('class')->delete();

        $posts = array(
            array(
                'title'      => 'class 9A',

            ),
            array(
                'title'      => 'class 9B',
            ),

        );
        DB::table('class')->insert($posts);
    }

}
