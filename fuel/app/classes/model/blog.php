<?php

class Model_Blog extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'content',
		'category',
		'image',
		'tag',
		'created_at',
		'updated_at',
		'status'
	);

	protected static $_table_name = 'blogs';
	protected static $_primary_key = array('id');
}
