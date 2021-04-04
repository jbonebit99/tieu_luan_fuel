<?php

class Controller_Frontend_Pricing_Tables extends Controller_Template
{
	public $template ='template_frontend';
	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Bảng Giá';
		$this->template->content = View::forge('frontend\pricing\tables/index', $data);
	}

}
