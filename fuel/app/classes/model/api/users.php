<?php

use Fuel\Core\DB;

class Model_Api_Users extends \Orm\Model
{
    protected static $_properties = array(
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
    );

    protected static $_table_name = 'users';

    protected static $_primary_key = array('id');

    public static function get_same_user($username, $email, $table)
    {
        $same_users = DB::select_array()
            ->where('username', '=', $username)
            ->or_where('email', '=', $email)
            ->from($table)
            ->execute();
        return $same_users;

    }
}
