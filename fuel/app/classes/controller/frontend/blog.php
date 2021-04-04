<?php

class Controller_Frontend_Blog extends Controller_Template
{
	public $template = 'template_frontend';
	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Bài Viết | Bất Động Sản [dxt.com.vn]';
        $this->template->subnav='blog';
		$this->template->content = View::forge('frontend\blog/index', $data);
	}

}
