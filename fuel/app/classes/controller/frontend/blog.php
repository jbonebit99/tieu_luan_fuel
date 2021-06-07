<?php
\Lang::load('lang');
class Controller_Frontend_Blog extends Controller_Template
{
	public $template = 'template_frontend';
	public function action_index()
	{
		$result = Model_Blog::find('all', array(
			'where'=>array(
				'status'=>1
			),
			'order_by' => array('created_at' => 'desc'),
		));
		$data['content']=array(
			'blog'=> $result,
		);
		$this->template->title = ucwords(\Lang::get('blog'));
        $this->template->subnav='blog';
		$this->template->content = View::forge('frontend\blog/index', $data);
	}

	public function action_view()
	{
		$data['content']=array();
		$this->template->title = ucwords(\Lang::get('blog'));
        $this->template->subnav='blog';
		$this->template->content = View::forge('frontend\blog/detail', $data);
	}

}
