<?php

class StudentsTableSeeder extends \Seeder {

	public function run()
	{
        DB::table('students')->delete();
        $lop = Lop::all();
        //$students = Student
        $posts = array(
            array(
                'title'      => 'student 1',
                'class_id'      =>$lop->first()->id,


            ),
            array(
                'title'      => 'student 2',
                'class_id'      => $lop->last()->id,
            ),

        );

        DB::table('students')->insert($posts);
	}

}
