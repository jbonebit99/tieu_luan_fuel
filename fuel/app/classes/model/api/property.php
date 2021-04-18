<?php

use Fuel\Core\DB;

class Model_Api_Property extends \Orm\Model
{
    public static function update_status_properties($id_properties)
    {
        $query = DB::update('property');
        $query->set(array(
            'status' => 0
        ));
        $query->where('id', '=', $id_properties);
        return $query->execute();
    }


    public static function get_properties_sort($shape = null , $type = null, $price = null, $sort = null , $limit = null, $offset = null)
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
        if ($sort != null && $price != null)
        {
            $query->order_by('property.'.$price, $sort);
        }elseif ($price==null && $sort!=null) {
            $query->order_by('property.created_at', $sort);
        }else {
            $query->order_by('property.created_at', 'desc');
        }
        if ($limit !== null) {
            $query->limit($limit);
        }
        if ($offset !== null) {
            $query->offset($offset);
        }
        return $query->execute();
    }
}
