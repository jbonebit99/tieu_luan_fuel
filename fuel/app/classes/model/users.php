<?php

use Fuel\Core\DB;

class Model_Users extends \Orm\Model
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



    public static function find_last_id()
    {
        return static::find('last')->id;
    }

}
