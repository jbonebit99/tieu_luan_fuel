<?php

use Fuel\Core\DB;
use Fuel\Core\Model;

class Model_Account extends Model
{
    public static function get_all_info_user($param)
    {
        $query = DB::select('*');
        $query->from('info_user');
        $query->join('social_user', 'INNER');
        $query->on('info_user.id_user', '=', 'social_user.id_user');
        $query->where('info_user.id_user', '=', $param);
        return $query->execute();
    }

    public static function get_Social_User()
    {
    }

    public static function get_avatar_user($param)
    {
        $query = DB::select('avatar');
        $query->from('info_user');
        $query->where('info_user.id_user', '=', $param);
        return $query->execute();
    }

    public static function update_info_user($table = '', $columns = array(), $condition)
    {
        $query = DB::update($table);
        $query->set($columns);
        $query->where('id_user', '=', $condition);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function insert_info_user($table, $columns = array())
    {
        $query = DB::insert($table);
        $query->set($columns);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public static function update_social_user($table = null, $columns = array(), $condition)
    {
        $query = DB::update($table);
        $query->set($columns);
        $query->where('id_user', '=', $condition);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
