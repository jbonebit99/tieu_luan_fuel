<?php

use Fuel\Core\DB;

class Model_Contacts extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'name',
        'email',
        'subject',
        'message',
        'created_at',
        'updated_at',
        'status',
    );


    protected static $_table_name = 'contacts';
    protected static $_primary_key = array('id');

    public static function insert_contacts($table = 'contact', $data = array())
    {
        $query = DB::insert($table);
        $query->set($data);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
