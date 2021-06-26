<?php


class Controller_Frontend_Welcome extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $result = Model_Property::get_properties(null, null, 5);
        $result_blog = Model_Blog::get_blogs(3);
        $data["subnav"] = array('index' => 'active');
        $data['content'] = array(
            'title' => 'Bán',
            'properties' => $result->as_array(),
            'blogs'=>$result_blog->as_array()
        );
        $this->template->title = 'Bất Động Sản Tại Đồng Bằng Sông Cửu Long';
        $this->template->subnav = 'home';
        $this->template->content = View::forge('frontend/welcome/index', $data);
    }

    public function action_404()
    {
        return Response::forge(Presenter::forge('welcome/404'), 404);
    }

    public function action_tag()
    {
       
    }


}
