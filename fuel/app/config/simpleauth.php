<?php

return array(
    'db_connection' => NULL,
    'db_write_connection' => NULL,
    'table_name' => 'users',
    'table_columns' => array(
        'id',
        'username',
        'email',
        'password',
        'group',
        'account_type',
        'created_at',
        'updated_at',
        'last_login',
        'login_hash',
        'status',
    ),
    'guest_login' => true,
    'multiple_logins' => false,
    'remember_me' =>
        array(
            'enabled' => true,
            'cookie_name' => 'rmcookie',
            'expiration' => 86400 * 31,
        ),
    'groups' =>
        array(
            -1  => array('name' => 'Banned', 'roles' => array('banned')),
            0   => array('name' => 'Guests', 'roles' => array()),
            1   => array('name' => 'Users', 'roles' => array('user')),
            50  => array('name' => 'Moderators', 'roles' => array('user', 'moderator')),
            100 => array('name' => 'Administrators', 'roles' => array('user', 'moderator', 'admin')),
        ),
    'roles' =>
        array(),
    'login_hash_salt' => 'OfCLwxoOKT7gZdqcIZIV',
    'username_post_key' => 'username',
    'password_post_key' => 'password',
);

/* End of file simpleauth.php */
