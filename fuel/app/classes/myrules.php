<?php

use Fuel\Core\DB;
use Fuel\Core\Input;

class MyRules
{

    public static function _validation_unique_username($val, $options)
    {
        list($table, $field) = explode('.', $options);

        $result = DB::select(DB::expr("LOWER (\"$field\")"))
            ->where($field, '=', Str::lower($val))
            ->from($table)->execute();

        return !($result->count() > 0);
    }

    public static function _validation_unique_email($val, $options)
    {
        list($table, $field) = explode('.', $options);

        $result = DB::select(DB::expr("LOWER (\"$field\")"))
            ->where($field, '=', Str::lower($val))
            ->from($table)->execute();

        return !($result->count() > 0);
    }

    public static function _validation_input_file($val, $options)
    {
        if ($options['name'][0]==null) {
            return false;
        }else{
            return true;
        }

    }


}
