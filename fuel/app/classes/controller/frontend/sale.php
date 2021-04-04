<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Response;

class Controller_Frontend_Sale extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $result = Model_Property::get_properties('sale');
        $data["subnav"] = array(
            'index' => 'sale',
        );
        $data['content'] = array(
            'title' => 'Bán',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Bán');
        $this->template->title = 'Bán';
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_lands_for_sale()
    {
        $result = Model_Property::get_properties('sale', 'lands');
        $data["subnav"] = array(
            'index' => 'sale',
        );
        $data['content'] = array(
            'title' => 'Bán Đất',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Bán Đất'
        );
        $this->template->title = 'Bán Đất';
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_houses_for_sale()
    {
        $result = Model_Property::get_properties('sale', 'houses');
        $data["subnav"] = array(
            'index' => 'sale',
        );
        $data['content'] = array(
            'title' => 'Bán Nhà Riêng',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Bán Nhà Riêng',
        );
        $this->template->title = 'Bán Nhà Riêng';
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_detail()
    {
        $result = Model_Property::get_property_by_id($this->param('id'),$this->param('shape'));
        $result_arr = array();
        foreach($result as $item)
        {
           $result_arr = $item;
        }
        if ($result->count() > 0) {
            $data['content'] = array(
                'title' => 'Bán Nhà Riêng',
                'properties' => $result_arr,
                'subtitle' => 'Danh Sách Tin Bán Nhà Riêng',
            );
            $this->template->title = 'Chi Tiết';
            $this->template->subnav = 'sale';
            $this->template->content = View::forge('frontend\sale_rent/details', $data);
        } else {
            Response::redirect('/');
        }




    }

}
