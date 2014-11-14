<?php

class PostsTableSeeder extends \Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('category_post')->delete();
        DB::table('posts')->delete();
        $posts = array(
            array(
                'title'      => 'Contact Us',
                'permalink'  => 'contact',
                'content'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'status'     => 'published',
                'type'       => 'page',
                'target'     => 'public',
                'created_by' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            )
        );
        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);

        $posts = array(
            array(
                'title'      => 'The first post',
                'permalink'  => 'the-first-post',
                'content'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'status'     => 'published',
                'type'       => 'post',
                'target'     => 'public',
                'created_by' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ),
            array(
                'title'      => 'The second post',
                'permalink'  => 'the-second-post',
                'content'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'status'     => 'published',
                'type'       => 'post',
                'target'     => 'public',
                'created_by' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ),
            array(
                'title'      => 'The third post',
                'permalink'  => 'the-thrid-post',
                'content'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'status'     => 'published',
                'type'       => 'post',
                'target'     => 'public',
                'created_by' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            )
        );
        DB::table('posts')->insert($posts);
        
        $post_category = array(
            array(
                'category_id' => 1,
                'post_id' => 2,
            ),
            array(
                'category_id' => 1,
                'post_id' => 3,
            )
        );
        // Uncomment the below to run the seeder
        DB::table('category_post')->insert($post_category);
    }

}
