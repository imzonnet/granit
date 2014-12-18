<?php
use Faker\Factory as Faker;

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

        $groupAdmin = Sentry::createGroup(array(
            'name'        => 'Super Administrators',
            'permissions' => array(
                'superuser' => 1
            ),
        ));
        
        $groupManager = Sentry::createGroup(array(
            'name'        => 'Manager',
            'permissions' => array(
                'manager' => 1
            ),
        ));
        
        $groupMember = Sentry::createGroup(array(
            'name'        => 'Members',
            'permissions' => array(
                'users' => 1
            ),
        ));

        // Assign user permissions
        $userGroup = Sentry::findGroupByName('Super Administrators');
        $user->addGroup($groupAdmin);
        $faker = Faker::create();
        foreach(range(1, 10) as $index) {
            $user = Sentry::createUser(array(
                'username'   => 'manager'.$index,
                'password'   => 'password',
                'email'     => $faker->email,
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'last_pw_changed' => new DateTime,
                'activated'  => 1,
                'photo' => $faker->imageUrl(rand(390, 400), 390, 'people')
            ));
            //$userGroup = Sentry::findGroupByName('Members');
            $user->addGroup($groupManager);
        }
        
        foreach(range(1, 50) as $index) {
            $user = Sentry::createUser(array(
                'username'   => 'member'.$index,
                'password'   => 'password',
                'email'     => $faker->email,
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'last_pw_changed' => new DateTime,
                'activated'  => 1,
            ));
            //$userGroup = Sentry::findGroupByName('Members');
            $user->addGroup($groupMember);
        }
    }

}
