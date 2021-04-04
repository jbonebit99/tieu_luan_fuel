<?php

class Model_Bookmark extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'id_properties',
        'id_user',
        'created_at',
        'updated_at',
        'status'
    );


    protected static $_table_name = 'bookmarks';
    protected static $_primary_key = array('id');

}
