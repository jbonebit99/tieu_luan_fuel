<?php

class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'content',
		'parent_id',
		'id_post',
		'created_at',
		'updated_at',
		'status'
	);

	protected static $_table_name = 'comment';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

	protected static $_belongs_to = array(
	);

	public static function insert_comment($table = null, $data = [])
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
            } catch (Database_Exception  $e) {
				return false;
			 }
        }
        return false;
    }

	public static function get_comments($id_post)
	{
		$query = DB::select('*');
        $query->from('comment');
        $query->where('status', 1);
		$query->and_where('id_post',$id_post);
        $query->order_by('created_at', 'asc');
        return $query->execute();
	}

}
