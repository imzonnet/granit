<?php

class PostsTableSeeder extends \Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('category_post')->delete();
        DB::table('posts')->delete();
        $user_id = User::first()->id;
        $pages = array(
            array(
                'title'      => 'Contact Us',
                'permalink'  => 'contact',
                'content'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'status'     => 'published',
                'type'       => 'page',
                'target'     => 'public',
                'created_by' => $user_id,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            )
        );
        // Uncomment the below to run the seeder
        DB::table('posts')->insert($pages);
        $images = array(
            'uploads/slideshow/1.jpg', 
            'uploads/slideshow/2.jpg', 
            'uploads/slideshow/3.jpg', 
            'uploads/slideshow/4.jpg'
        );
        foreach ($images as $key => $image) {
            DB::table('posts')->insert(array(
                'title'      => 'The post title' . $key,
                'permalink'  => 'the-post-title-' . $key,
                'content'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'status'     => 'published',
                'image'      => $image,
                'type'       => 'post',
                'target'     => 'public',
                'created_by' => $user_id,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ));
        }
        
        $posts = Post::all();
        $cat_id = Category::first()->id;
        foreach ($posts as $post) {
            $post_category = array(
                'category_id' => $cat_id,
                'post_id' => $post->id,
            );
            // Uncomment the below to run the seeder
        DB::table('category_post')->insert($post_category);
        }
        
        
    }

}
