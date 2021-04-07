<?php

use Auth\Auth;
use Fuel\Core\Controller_Template;
use Fuel\Core\Date;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Upload;
use Fuel\Core\Validation;
use Fuel\Core\View;

class Controller_Frontend_Submit_Property extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        if (Input::method() == 'POST') {
            list($driver, $id_user) = Auth::get_user_id();
            if (!empty(Input::post('submit-properties'))) {
                $val = Validation::forge('form_submit_property');
                $val->add_field('title', 'Tiêu đề', 'required|max_length[250]');
                $val->add_field('shape', 'Trạng thái', 'required');
                $val->add_field('type', 'Loại', 'required');
                $val->add_field('price', 'Giá', 'required');
                $val->add_field('name', 'Tên', 'required');
                $val->add_field('phone', 'Điện thoại', 'required');
                $val->add_field('area', 'Diện tích', 'required');
                $val->add_field('longitude', 'Kinh độ', 'required');
                $val->add_field('latitude', 'Vỹ độ', 'required');
                $val->set_message('required', 'Vui lòng nhập vào :label');
                $val->set_message('max_length', ':label tối đa :param:1 ký tụ');
                if (!$val->run()) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View submit property
                        'data' => $val->validated() // data Dung o View
                    );
                    $this->template->title = 'Đăng tin Bất Động Sản';
                    $this->template->subnav = '';
                    $this->template->content = View::forge('frontend\submit\property/index', $data);
                } else {
                    $p_data = array(
                        'title' => $val->validated('title'),
                        'shape' => $val->validated('shape'),
                        'type' => $val->validated('type'),
                        'price' => $val->validated('price'),
                        'area' => $val->validated('area'),
                        'rooms' => (Input::post('rooms') < 6) ? Input::post('rooms') : 6,
                        'expiration_date' => null,
                        'created_at' => Date::forge()->get_timestamp(),
                        'updated_at' => null,
                        'user_id' => (isset($id_user)) ? $id_user : 0,
                        'status' => 0,
                    );
                    Model_Property::insert_properties('property', $p_data);
                    $id_properties = Model_Property::find_last_id();
                    $p_data_contact = array(
                        'name' => $val->validated('name'),
                        'email' => Input::post('email'),
                        'phone' => $val->validated('phone'),
                        'status' => 0,
                        'id_properties' => $id_properties,
                    );
                    Model_Property::insert_properties('contact_properties', $p_data_contact);
                    //properties_data_map
                    $p_data_map = array(
                        'longitude' => $val->validated('longitude'),
                        'latitude' => $val->validated('latitude'),
                        'id_properties' => $id_properties,
                        'status' => 0,
                    );
                    Model_Property::insert_properties('map_properties', $p_data_map);
                    //properties_data_detail
                    $p_data_detail = array(
                        'description' => Input::post('description'),
                        'bedrooms' => Input::post('bedrooms'),
                        'toilets' => Input::post('toilets'),
                        'gym' => (Input::post('check-gym') == 'on') ? 1 : 0,
                        'market' => (Input::post('check-market') == 'on') ? 1 : 0,
                        'hospital' => (Input::post('check-hospital') == 'on') ? 1 : 0,
                        'parking' => (Input::post('check-parking') == 'on') ? 1 : 0,
                        'id_properties' => $id_properties,
                        'status' => 0,
                    );
                    Model_Property::insert_properties('detail_properties', $p_data_detail);
                    //properties_data_location
                    $p_data_location = array(
                        'address' => Input::post('address'),
                        'province' => Model_Property::get_province(intval(Input::post('province'))),
                        'district' => Model_Property::get_district(intval(Input::post('district'))),
                        'ward' => Model_Property::get_ward(intval(Input::post('ward'))),
                        'id_properties' => $id_properties,
                        'status' => 0,
                    );
                    Model_Property::insert_properties('location_properties', $p_data_location);
                    //properties_data_image
                    if (Input::file('image') == null) {
                        $p_data_image = array();
                        Controller_Utility::img_uploads();
                        $i = 0;
                        if (Upload::get_files()) {
                            foreach (Upload::get_files() as $file) {
                                $p_data_image[$i]['file_name'] = $file['saved_as'];
                                $p_data_image[$i]['id_properties'] = $id_properties;
                                $p_data_image[$i]['status'] = 0;
                                $i++;
                            }
                            Model_Property::insert_image_properties('img_properties', $p_data_image);
                        }
                    } else {
                        foreach (Upload::get_errors() as $file) {
                            $error = $file['errors']['0']['message'];
                            $view = View::forge('frontend\submit\property/index');
                            $view->set('error', $error);
                            return Response::forge($view);
                        }
                    }
                    $data = array();
                    $this->template->title = 'Đăng tin Bất Động Sản';
                    $this->template->subnav = '';
                    $this->template->content = View::forge('frontend\submit\property/index', $data);
                }
            } else {
                $data = array();
                $this->template->title = 'Đăng tin Bất Động Sản';
                $this->template->subnav = '';
                $this->template->content = View::forge('frontend\submit\property/index', $data);
            }
        } else {
            $data["subnav"] = array('index' => 'active');
            $this->template->title = 'Đăng tin Bất Động Sản';
            $this->template->subnav = '';
            $this->template->content = View::forge('frontend\submit\property/index', $data);
        }
    }

    public function action_create()
    {
    }

    public function action_edit()
    {

    }

    public function action_delete()
    {
        //delete thi status nhan gia tri la 3
        $p_data_table = array(
            'img_properties',
            'contact_properties',
            'detail_properties',
            'map_properties',
            'location_properties',
            'property',
        );
        $p_data = array(
            'status' => 1,
        );
        $result = Model_Property::delete_properties($p_data_table, $p_data, '56');
        die;
//
//        Model_Frontend_Properties::update_properties('img_properties', $p_data, 'id_properties',$id);
//        Model_Frontend_Properties::update_properties('contact_properties', $p_data, 'id_properties',$id);
//        Model_Frontend_Properties::update_properties('detail_properties', $p_data, 'id_properties',$id);
//        Model_Frontend_Properties::update_properties('map_properties', $p_data, 'id_properties',$id);
//        Model_Frontend_Properties::update_properties('location_properties', $p_data, 'id_properties',$id);
//        Model_Frontend_Properties::update_properties('property', $p_data, 'id_properties',$id);
//
    }

    public function action_hide($id)
    {
        //hide thi staus nhan gia tri la 2
        $p_data = array(
            'status' => 2,
        );
        Model_Frontend_Properties::update_properties('img_properties', $p_data, 'id_properties', $id);
        Model_Frontend_Properties::update_properties('contact_properties', $p_data, 'id_properties', $id);
        Model_Frontend_Properties::update_properties('detail_properties', $p_data, 'id_properties', $id);
        Model_Frontend_Properties::update_properties('map_properties', $p_data, 'id_properties', $id);
        Model_Frontend_Properties::update_properties('location_properties', $p_data, 'id_properties', $id);
        Model_Frontend_Properties::update_properties('property', $p_data, 'id_properties', $id);
    }

}
