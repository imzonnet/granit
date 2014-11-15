<?php

class SentrySeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        $user = Sentry::createUser(array(
            'username'   => 'admin',
            'password'   => 'admin123',
            'email'     => 'admin@admin.com',
            'first_name' => 'Super',
            'last_name'  => 'Administrator',
            'last_pw_changed' => new DateTime,
            'activated'  => 1,
        ));

        $group = Sentry::createGroup(array(
            'name'        => 'Super Administrators',
            'permissions' => array(
                'superuser' => 1
            ),
        ));

        // Assign user permissions
        $userGroup = Sentry::findGroupByName('Super Administrators');
        $user->addGroup($userGroup);
    }

}
