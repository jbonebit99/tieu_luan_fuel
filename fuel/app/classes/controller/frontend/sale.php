<?php

use Fuel\Core\Controller_Template;
use Fuel\Core\Response;

class Controller_Frontend_Sale extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'sale',
            'total_items'    => Model_Property::get_properties('sale')->count(),
            'per_page'       => 6,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('sale', null, $pagination->per_page, $pagination->offset);
        $data["subnav"] = array(
            'index' => 'sale',
        );
        $data['content'] = array(
            'title' => 'Bán',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Bán'
        );
        $this->template->title = 'Bán';
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_lands_for_sale()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'sale/lands',
            'total_items'    => 10,
            'per_page'       => 6,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('sale', 'lands', $pagination->per_page, $pagination->offset);
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
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'sale/lands',
            'total_items'    => Model_Property::get_properties('sale','houses')->count(),
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('sale', 'houses', $pagination->per_page, $pagination->offset);
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
        $featured = Model_Property::get_featured_properties(3);
        $same_properties = Model_Property::get_same_properties();
        $result = Model_Property::get_property_by_id($this->param('id'), $this->param('shape'));
        $result_arr = array();
        foreach ($result as $item) {
            $result_arr = $item;
        }
        if ($result->count() > 0) {
            $data['content'] = array(
                'title' => 'Bán Nhà Riêng',
                'properties' => $result_arr,
                'subtitle' => 'Danh Sách Tin Bán Nhà Riêng',
                'featured'=>$featured->as_array(),
                'same_properties'=>  $same_properties->as_array(),
            );
            $this->template->title = 'Chi Tiết';
            $this->template->subnav = 'sale';
            $this->template->content = View::forge('frontend\sale_rent/details', $data);
        } else {
            Response::redirect('/');
        }
    }

    public function action_detail_preview()
    {
       if (Auth::check())
       {
        $featured = Model_Property::get_featured_properties(3);
        $same_properties = Model_Property::get_same_properties();
        $result = Model_Property::get_properties_preview_by_id($this->param('id'),$this->param('shape'));
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
                'featured'=>$featured->as_array(),
                'same_properties'=>  $same_properties->as_array(),
            );
            $this->template->title = 'Chi Tiết';
            $this->template->subnav = 'rent';
            $this->template->content = View::forge('frontend\sale_rent/details', $data);
        } else {
            Response::redirect('/');
        }
       }
       else {
        Response::redirect('/');
       }
    }
}
