<?php

class Controller_Frontend_Compare_Properties extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'So Sánh';
        $this->template->subnav='compare-properties';
        $this->template->content = View::forge('frontend\compare\properties/index', $data);
    }

}
