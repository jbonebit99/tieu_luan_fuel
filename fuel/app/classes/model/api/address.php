<?php

use Fuel\Core\DB;

class Model_Api_Address extends \Orm\Model
{
    public static function get_province($_param = null)
    {
        $_province = DB::select('id', '_name');
        $_province->from('province');
        return $_province->execute();
    }

    public static function get_district($_province_id)
    {
        $_district = DB::select('id', '_name');
        $_district->from('district');
        $_district->where('_province_id', '=', $_province_id);
        return $_district->execute();
    }

    public static function get_ward($_district_id)
    {
        $ward = DB::select('id', '_name');
        $ward->from('ward');
        $ward->where('_district_id', '=', $_district_id);
        return $ward->execute();
    }

}
