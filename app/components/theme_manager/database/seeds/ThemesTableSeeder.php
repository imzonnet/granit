<?php

class ThemesTableSeeder extends \Seeder {

    public function run()
    {
        Eloquent::unguard();

        $themes = array(
                array(
                    'name'        => 'Default Public Theme',
                    'version'     => '1.0',
                    'author'      => '',
                    'description' => 'Default Public Theme',
                    'screenshot'  => '',
                    'directory'   => 'default',
                    'target'      => 'public',
                    'created_by'  => 1
                ),
                array(
                    'name'        => 'Default Admin Theme',
                    'version'     => '1.0',
                    'author'      => '',
                    'description' => 'Default Admin Theme',
                    'screenshot'  => '',
                    'directory'   => 'default',
                    'target'      => 'admin',
                    'created_by'  => 1
                ),
                array(
                    'name'        => 'Default Backend Theme',
                    'version'     => '1.0',
                    'author'      => '',
                    'description' => 'Default Backend Theme',
                    'screenshot'  => '',
                    'directory'   => 'default',
                    'target'      => 'backend',
                    'created_by'  => 1
                ),
                array(
                    'name'        => 'Exception',
                    'version'     => '1.1',
                    'author'      => 'John Nguyen',
                    'description' => 'Exception Theme',
                    'screenshot'  => '',
                    'directory'   => 'exception',
                    'target'      => 'public',
                    'created_by'  => 1
                )
            );

        DB::table('themes')->insert($themes);
        DB::table('settings')->insert(array(
            'name' => 'public_theme',
            'value' => 4
        ));
    }

}
