<?php

use Fuel\Core\DB;

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


}
