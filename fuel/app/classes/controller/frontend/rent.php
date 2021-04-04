<?php

use Fuel\Core\Controller_Template;

class Controller_Frontend_Rent extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $result = Model_Property::get_properties('rent');
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
        $result = Model_Property::get_properties('rent','ware-housing');
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
        $result = Model_Property::get_properties('rent','office');
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
            $this->template->subnav = 'rent';
            $this->template->content = View::forge('frontend\sale_rent/details', $data);
        } else {
            Response::redirect('/');
        }




    }

}
