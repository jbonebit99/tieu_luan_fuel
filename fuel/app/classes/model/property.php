<?php

use Fuel\Core\DB;
use Fuel\Core\PhpErrorException;

class Model_Property extends \Orm\Model
{
    protected static $_table_name = 'property';
    protected static $_properties = array(
        'id',
        'title',
        'shape',
        'type',
        'price',
        'area',
        'rooms',
        'expiration_date',
        'created_at',
        'updated_at',
        'user_id',
        'status',
    );
    protected static $_primary_key = array('id');

    public static function rollback()
    {
        return DB::rollback_transaction();
    }

    public static function get_properties_newly($limit)
    {
        try {
            $_p_newly = DB::query("SELECT * FROM property LIMIT :limit");
            $_p_newly->bind('limit', $limit);
        } catch (PhpErrorException $e) {}
    }

    public static function insert_properties($table = null, $data = [])
    {
        if (isset($table)) {
            try {
                $query = DB::insert($table);
                $query->set($data);
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PhpErrorException $e) {}
        }
        return false;
    }

    public static function insert_image_properties($table = null, $data = array())
    {
        if (isset($table)) {
            try {
                $query = DB::insert($table);
                $query->columns(array(
                    'file_name',
                    'id_properties',
                    'status',
                ));
                $query->values($data);
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PhpErrorException $e) {}
        }
        return false;
    }

    public static function update_properties($table = null, $data = [], $columns = null, $condition = null)
    {
        if (isset($table)) {
            try {
                $query = DB::update($table);
                $query->set($data);
                $query->where($columns, '=', $condition);
                if ($query->execute()) {
                    return true;
                } else {
                    return false;
                }
            } catch (PhpErrorException $e) {}
        }
        return false;
    }

    public static function delete_properties($array_table = array(), $columns = array(), $condition = null)
    {
        foreach ($array_table as $table):
            $query = DB::update($table);
            $query->set($columns);
            if ($table !== 'property') {
                $query->where('id_properties', $condition);
            } else {

                $query->where('id', $condition);
            }
            $query->execute();
        endforeach;
    }

    public static function get_province($_province_id)
    {
        $_name = '';
        $_province = DB::select('id', '_name');
        $_province->from('province');
        $_province->where('id', '=', $_province_id);
        $data = $_province->execute();
        foreach ($data as $p) {
            $_name .= $p['_name'];
        }
        return $_name;
    }

    public static function get_district($_district_id)
    {
        $_name = '';
        $_district = DB::select('id', '_name');
        $_district->from('district');
        $_district->where('id', '=', $_district_id);
        $data = $_district->execute();
        foreach ($data as $d) {
            $_name .= $d['_name'];
        }
        return $_name;
    }

    public static function get_ward($_ward_id)
    {
        $_name = '';
        $_ward = DB::select('id', '_name');
        $_ward->from('ward');
        $_ward->where('id', '=', $_ward_id);
        $data = $_ward->execute();
        foreach ($data as $w) {
            $_name .= $w['_name'];
        }
        return $_name;
    }

    public static function find_last_id()
    {
        return static::find('last')->id;
    }

    public static function get_properties($shape, $type = null, $limit = null, $offset = null)
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.shape',
            'property.type',
            'property.price',
            'property.area',
            'property.rooms',
            'property.created_at',
            'property.featured',
            'location_properties.address',
            'location_properties.province',
            'location_properties.district',
            'location_properties.ward',
            'detail_properties.description',
            'detail_properties.bedrooms',
            'detail_properties.toilets',
            'detail_properties.gym',
            'detail_properties.market',
            'detail_properties.hospital',
            'detail_properties.parking',
            'contact_properties.name',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('location_properties', 'LEFT');
        $query->on('property.id', '=', 'location_properties.id_properties');
        $query->join('detail_properties', 'LEFT');
        $query->on('property.id', '=', 'detail_properties.id_properties');
        $query->join('contact_properties', 'LEFT');
        $query->on('property.id', '=', 'contact_properties.id_properties');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->where('property.status', 1);
        if ($shape !== null) {
            $query->and_where('property.shape', $shape);
        }
        if ($type !== null) {
            $query->and_where('property.type', $type);
        }
        $query->group_by('img_properties.id_properties');
        $query->order_by('property.created_at', 'desc');
        if ($limit !== null) {
            $query->limit($limit);
        }
        if ($offset !== null) {
            $query->offset($offset);
        }
        return $query->execute();
    }

    public static function get_properties_by_user($id_user = null)
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.price',
            'property.shape',
            'property.expiration_date',
            'property.status',
            'location_properties.address',
            'location_properties.province',
            'location_properties.district',
            'location_properties.ward',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('location_properties', 'LEFT');
        $query->on('property.id', '=', 'location_properties.id_properties');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->where('property.user_id', $id_user);
        $query->and_where('property.status', '!=', -1);
        $query->group_by('img_properties.id_properties');
        return $query->execute();
    }

    public static function get_properties_by_status($status = 0)
    {
        $query = DB::select_array(array(
            'property.id',
            'property.shape',
            'property.title',
            'property.user_id',
            'property.created_at',
            'users.username',
        ));
        $query->from('property');
        $query->join('users', 'LEFT');
        $query->on('property.user_id', '=', 'users.id');
        $query->where('property.status', $status);
        $query->order_by('created_at', 'desc');
        return $query->execute();
    }

    public static function get_user_by_id()
    {
        $query = DB::select_array(array(
            'users.username',
        ));
        $query->from('users');
        $query->where('status', '!=', -1);
        return $query->execute();
    }

    public static function get_property_by_id($id = null, $shape = '')
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.shape',
            'property.type',
            'property.price',
            'property.area',
            'property.rooms',
            'property.created_at',
            'location_properties.address',
            'location_properties.province',
            'location_properties.district',
            'location_properties.ward',
            'detail_properties.description',
            'detail_properties.gym',
            'detail_properties.market',
            'detail_properties.hospital',
            'detail_properties.parking',
            'detail_properties.bedrooms',
            'detail_properties.toilets',
            'contact_properties.name',
            'contact_properties.email',
            'contact_properties.phone',
            'map_properties.longitude',
            'map_properties.latitude',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('location_properties', 'LEFT');
        $query->on('property.id', '=', 'location_properties.id_properties');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->join('map_properties', 'LEFT');
        $query->on('property.id', '=', 'map_properties.id_properties');
        $query->join('detail_properties', 'LEFT');
        $query->on('property.id', '=', 'detail_properties.id_properties');
        $query->join('contact_properties', 'LEFT');
        $query->on('property.id', '=', 'contact_properties.id_properties');
        $query->where('property.id', $id);
        $query->and_where('property.status', 1);
        $query->and_where('property.shape', $shape);
        $query->group_by('img_properties.id_properties');
        $query->as_assoc();
        return $query->execute();
    }

    public static function get_properties_preview_by_id($id = null, $shape = '')
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.shape',
            'property.type',
            'property.price',
            'property.area',
            'property.rooms',
            'property.created_at',
            'location_properties.address',
            'location_properties.province',
            'location_properties.district',
            'location_properties.ward',
            'detail_properties.description',
            'detail_properties.gym',
            'detail_properties.market',
            'detail_properties.hospital',
            'detail_properties.parking',
            'detail_properties.bedrooms',
            'detail_properties.toilets',
            'contact_properties.name',
            'contact_properties.email',
            'contact_properties.phone',
            'map_properties.longitude',
            'map_properties.latitude',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('location_properties', 'LEFT');
        $query->on('property.id', '=', 'location_properties.id_properties');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->join('map_properties', 'LEFT');
        $query->on('property.id', '=', 'map_properties.id_properties');
        $query->join('detail_properties', 'LEFT');
        $query->on('property.id', '=', 'detail_properties.id_properties');
        $query->join('contact_properties', 'LEFT');
        $query->on('property.id', '=', 'contact_properties.id_properties');
        $query->where('property.id', $id);
        $query->and_where('property.status', 'in', array(0, 1));
        $query->and_where('property.shape', $shape);
        $query->group_by('img_properties.id_properties');
        $query->as_assoc();
        return $query->execute();
    }

    public static function get_featured_properties($limit = null)
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.shape',
            'property.type',
            'property.price',
            'property.area',
            'property.rooms',
            'property.featured',
            'property.created_at',
            'detail_properties.bedrooms',
            'detail_properties.toilets',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->join('detail_properties', 'LEFT');
        $query->on('property.id', '=', 'detail_properties.id_properties');
        $query->where('property.featured', 1);
        $query->and_where('property.status', 1);
        $query->group_by('img_properties.id_properties');
        $query->order_by('created_at', 'DESC');
        $query->limit($limit);
        return $query->execute();
    }

    public static function get_same_properties()
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.shape',
            'property.type',
            'property.price',
            'property.area',
            'property.rooms',
            'property.featured',
            'property.created_at',
            'location_properties.province',
            'location_properties.district',
            'detail_properties.bedrooms',
            'detail_properties.toilets',
            'contact_properties.name',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->join('detail_properties', 'LEFT');
        $query->on('property.id', '=', 'detail_properties.id_properties');
        $query->join('contact_properties', 'LEFT');
        $query->on('property.id', '=', 'contact_properties.id_properties');
        $query->join('location_properties', 'LEFT');
        $query->on('property.id', '=', 'location_properties.id_properties');
        $query->where('property.featured', 1);
        $query->and_where('property.status', 1);
        $query->group_by('img_properties.id_properties');
        $query->order_by(DB::expr('RAND()'));
        $query->limit(3);
        return $query->execute();
    }

    public static function search_property($key, $shape = null, $type = null, $limit = null, $offset = null)
    {
        $query = DB::select_array(array(
            'property.id',
            'property.title',
            'property.shape',
            'property.type',
            'property.price',
            'property.area',
            'property.rooms',
            'property.created_at',
            'property.featured',
            'location_properties.address',
            'location_properties.province',
            'location_properties.district',
            'location_properties.ward',
            'detail_properties.description',
            'detail_properties.bedrooms',
            'detail_properties.toilets',
            'detail_properties.gym',
            'detail_properties.market',
            'detail_properties.hospital',
            'detail_properties.parking',
            'contact_properties.name',
            array(DB::expr('group_concat( img_properties.file_name SEPARATOR "/" )'), 'src'),
        ));
        $query->from('property');
        $query->join('location_properties', 'LEFT');
        $query->on('property.id', '=', 'location_properties.id_properties');
        $query->join('detail_properties', 'LEFT');
        $query->on('property.id', '=', 'detail_properties.id_properties');
        $query->join('contact_properties', 'LEFT');
        $query->on('property.id', '=', 'contact_properties.id_properties');
        $query->join('img_properties', 'LEFT');
        $query->on('property.id', '=', 'img_properties.id_properties');
        $query->where('property.status', 1);
        $query->and_where('property.title', 'LIKE', "%".$key."%");
        $query->or_where('location_properties.district', 'LIKE',"%".$key."%");
        if ($shape !== null) {
            if ($shape !== 'all') {
                $query->and_where('property.shape', $shape);
            }
        }
        if ($type !== null) {
            if ($type !== 'all') {
                $query->and_where('property.type', $type);
            }
        }
        $query->group_by('img_properties.id_properties');
        $query->order_by('property.created_at', 'desc');
        if ($limit !== null) {
            $query->limit($limit);
        }
        if ($offset !== null) {
            $query->offset($offset);
        }
        return $query->execute();
    }
    public static function get_all_property()
    {
        $query = DB::select_array(array(
            'property.id',
            'property.shape',
            'property.title',
            'property.user_id',
            'property.created_at',
            'property.status',
            'users.username',
        ));
        $query->from('property');
        $query->join('users', 'LEFT');
        $query->on('property.user_id', '=', 'users.id');
        $query->order_by('created_at', 'desc');
        return $query->execute();
    }
}
