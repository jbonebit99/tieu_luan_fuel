<?php

class Model_Blog extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'title',
        'sub_description',
        'content',
        'category',
        'image',
        'tag',
        'created_at',
        'updated_at',
        'status',
    );

    protected static $_table_name = 'blogs';
    protected static $_primary_key = array('id');

    public static function insert_blog($table = null, $data = [])
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
            } catch (Database_Exception $e) {
                return false;
            }
        }
        return false;
    }

    public static function update_blog($table, $data = [], $id)
    {
        try {
            $query = DB::update($table);
            $query->set($data);
            $query->where('id', $id);
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Database_Exception $th) {
            return false;
        }
    }

    public static function get_blogs($limit = null, $offset = null)
    {
        $query = DB::select_array(
            array(
                'blogs.*',
                array(DB::expr('count(comment.id)'), 'total_comment'),
            )
        );
        $query->from('blogs');
        $query->join('comment', 'LEFT');
        $query->on('blogs.id', '=', 'comment.id_post');
        $query->where('blogs.status', 1);
        $query->group_by('blogs.id');
        $query->order_by('blogs.created_at', 'desc');
        if ($limit !== null) {
            $query->limit($limit);
        }
        if ($offset !== null) {
            $query->offset($offset);
        }
        return $query->execute();
    }
    public static function get_all_blogs()
    {
        $query = DB::select_array(
            array(
                'blogs.*',
                array(DB::expr('count(comment.id)'), 'total_comment'),
            )
        );
        $query->from('blogs');
        $query->join('comment', 'LEFT');
        $query->on('blogs.id', '=', 'comment.id_post');
        $query->where('blogs.status',"!=", -1);
        $query->group_by('blogs.id');
        $query->order_by('blogs.created_at', 'desc');
        return $query->execute();
    }

    public static function get_blog($id)
    {
        $query = DB::select('*');
        $query->from('blogs');
        $query->where('status', 1);
        $query->and_where('id', $id);
        return $query->execute();
    }

    public static function search_blogs($key, $limit = null, $offset = null)
    {
        $query = DB::select('*');
        $query->from('blogs');
        $query->where('status', 1);
        $query->and_where('title', 'LIKE', '%' . $key . '%');
        $query->or_where('category', 'LIKE', '%' . $key . '%');
        if ($limit !== null) {
            $query->limit($limit);
        }
        if ($offset !== null) {
            $query->offset($offset);
        }
        return $query->execute();
    }

    public static function get_blogs_random()
    {
        $query = DB::select_array(
            array(
                'blogs.*',
            )
        );
        $query->from('blogs');
        $query->where('status', 1);
        $query->order_by(DB::expr('RAND()'));
        $query->limit(3);
        return $query->execute();
    }
}
