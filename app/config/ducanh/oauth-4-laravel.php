<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | oAuth Config
      |--------------------------------------------------------------------------
     */

    /**
     * Storage
     */
    'storage' => 'Session',
    /**
     * Consumers
     */
    'consumers' => array(
        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id' => '1589964017888554',
            'client_secret' => '25e983f490148e563006f0adf2c6239d',
            'scope' => array('email'),
        ),
        /**
         * Google
         */
        'Google' => array(
            'client_id' => '434782870385-qeki3c4c99v22q1iqqe05kh8k15bqhbf.apps.googleusercontent.com',
            'client_secret' => 'oT-8pL2FspcWtoXjAtZZX9s4',
            'scope' => array('userinfo_email', 'userinfo_profile'),
        ),
        /**
         * Twitter
         */
        'Twitter' => array(
            'client_id' => 'rmQu3d6XmLovM72nZBCQDAp5C',
            'client_secret' => 'xU1EuC0i8xC36fQQTJwddVB0z1lQU3I6XfVjaPLGH4X1F0KNKl',
        ),
    )
);
