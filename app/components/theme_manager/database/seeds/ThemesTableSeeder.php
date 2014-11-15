<?php

class ThemesTableSeeder extends \Seeder {

    public function run()
    {
        DB::table('themes')->truncate();
        DB::table('settings')->truncate();
        $user_id = User::first()->id;
        $themes = array(
                array(
                    'name'        => 'Default Public Theme',
                    'version'     => '1.0',
                    'author'      => '',
                    'description' => 'Default Public Theme',
                    'screenshot'  => '',
                    'directory'   => 'default',
                    'target'      => 'public',
                    'created_by'  => $user_id
                ),
                array(
                    'name'        => 'Default Admin Theme',
                    'version'     => '1.0',
                    'author'      => '',
                    'description' => 'Default Admin Theme',
                    'screenshot'  => '',
                    'directory'   => 'default',
                    'target'      => 'admin',
                    'created_by'  => $user_id
                ),
                array(
                    'name'        => 'Default Backend Theme',
                    'version'     => '1.0',
                    'author'      => '',
                    'description' => 'Default Backend Theme',
                    'screenshot'  => '',
                    'directory'   => 'default',
                    'target'      => 'backend',
                    'created_by'  => $user_id
                ),
                array(
                    'name'        => 'Exception',
                    'version'     => '1.1',
                    'author'      => 'John Nguyen',
                    'description' => 'Exception Theme',
                    'screenshot'  => '',
                    'directory'   => 'exception',
                    'target'      => 'public',
                    'created_by'  => $user_id
                )
            );

        DB::table('themes')->insert($themes);
        $theme_id = Theme::where('name', '=', 'Exception')->first()->id;

        DB::table('settings')->insert(array(
            'name' => 'public_theme',
            'value' => $theme_id
        ));
    }

}
