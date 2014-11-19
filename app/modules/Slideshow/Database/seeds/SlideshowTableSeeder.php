<?php namespace Modules\Slideshow\Database\Seeds;
use DB;

class SlideshowTableSeeder extends \Seeder {

    public function run()
    {
        DB::table('slideshow')->delete();
        $user_id = \User::first()->id;
        $images = array(
            'uploads/slideshow/1.jpg', 
            'uploads/slideshow/2.jpg', 
            'uploads/slideshow/3.jpg', 
            'uploads/slideshow/4.jpg'
        );
        foreach ($images as $key => $image) {
            $data = array(
                'caption' => 'The image caption ' . $key,
                'image' => $image,
                'status' => 'published',
                'created_by' => $user_id,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            );
            DB::table('slideshow')->insert($data);
        }
    }

}
