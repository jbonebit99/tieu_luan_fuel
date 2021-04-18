<?php

use Auth\Auth;
use Fuel\Core\Controller_Template;

class Controller_Frontend_Rent extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'rent',
            'total_items'    => Model_Property::get_properties('rent')->count(),
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('rent',null, $pagination->per_page, $pagination->offset);
        $data["subnav"] = array(
            'index' => 'active',
            );
        $data['content'] = array(
            'title' => 'Cho Thuê',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Cho Thuê');
        $this->template->title = 'Cho Thuê';
        $this->template->subnav='rent';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_ware_housing_for_rent()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'rent/ware-housing',
            'total_items'    => Model_Property::get_properties('rent','ware-housing')->count(),
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('rent','ware-housing', $pagination->per_page, $pagination->offset);
        $data["subnav"] = array(
            'index' => 'active',
            );
        $data['content'] = array(
            'title' => 'Cho Thuê Kho Bãi',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Cho Thuê Kho Bãi',
        );
        $this->template->title = 'Kho Bãi Cho Thuê';
        $this->template->subnav='rent';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_office_for_rent()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'rent/office',
            'total_items'    => 10,
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('rent','office', $pagination->per_page, $pagination->offset);
        $data["subnav"] = array(
            'index' => 'active'
        );
        $data['content'] = array(
            'title' => 'Cho Thuê Văn Phòng',
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Cho Thuê Văn Phòng'
        );
        $this->template->title = 'Văn Phòng Cho Thuê';
        $this->template->subnav='rent';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }
    public function action_detail()
    {   

        $featured = Model_Property::get_featured_properties(3);
        $same_properties = Model_Property::get_same_properties();
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
