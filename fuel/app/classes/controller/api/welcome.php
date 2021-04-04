<?php

class Controller_Api_Welcome extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Api welcome &raquo; Index';
		$this->template->content = View::forge('api\welcome/index', $data);
	}

}
