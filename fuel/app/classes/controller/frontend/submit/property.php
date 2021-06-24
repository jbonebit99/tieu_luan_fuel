<?php

use Auth\Auth;
use Fuel\Core\Controller_Template;
use Fuel\Core\Date;
use Fuel\Core\Input;
use Fuel\Core\Response;
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
            $val = Validation::forge('form_submit_property');
            $val->add_callable(new MyRules());
            $val->add_field('title', 'Tiêu đề', 'required|max_length[250]');
            $val->add_field('shape', 'Trạng thái', 'required');
            $val->add_field('type', 'Loại', 'required');
            $val->add_field('price', 'Giá', 'required');
            $val->add_field('name', 'Tên', 'required');
            $val->add_field('phone', 'Điện thoại', 'required');
            $val->add_field('area', 'Diện tích', 'required');
            $val->add_field('longitude', 'Kinh độ', 'required');
            $val->add_field('latitude', 'Vỹ độ', 'required');
            $val->add('images', 'Hình ảnh', array(), array())->add_rule('input_file', Input::file('images'));
            $val->set_message('required', 'Vui lòng nhập vào :label');
            $val->set_message('max_length', ':label tối đa :param:1 ký tụ');
            $val->set_message('input_file', 'Vui lòng chọn it nhất 1 hình ảnh.');
            if (!$val->run()) {
                $data["errors"] = array(
                    'error' => $val->error(), // Chi muc thong bao loi. Se dung o View submit property
                    'data' => "Da xay ra loi. Vui long thu lai", // data Dung o View
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
                    'expiration_date' => $this->create_expiration($id_user, \Date::forge()->get_timestamp()),
                    'created_at' => Date::forge()->get_timestamp(),
                    'updated_at' => null,
                    'user_id' => (isset($id_user)) ? $id_user : 0,
                    'featured' => $this->check_featured_account($id_user),
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
                //                foreach (Upload::get_errors() as $file) {
                //                    $error = $file['errors']['0']['message'];
                //                    $view = View::forge('frontend\submit\property/index');
                //                    $view->set('error', $error);
                //                    return Response::forge($view);
                //                }
                $data["errors"] = array(
                    'error' => '',
                    'data' => '',
                );
                Controller_Utility::message('Tin của bạn sẽ được xử lý trong 1 - 2 giờ làm việc!');
                $this->template->title = 'Đăng tin Bất Động Sản';
                $this->template->subnav = '';
                $this->template->content = View::forge('frontend\submit\property/index', $data);
            }
        } else {
            $data["errors"] = array(
                'error' => '',
                'data' => '',
            );
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
        if (Auth::check()) {
            $p_data = array(
                "status" => -1,
            );
            $result = Model_Property::update_properties('property', $p_data, 'id', $this->param('id'));
            if ($result) {
                Controller_Utility::message("Thành công");

                Response::redirect('account/my-properties');
            } else {
                Controller_Utility::message('Xin lỗi bạn không có quyền làm việc này!');
                Response::redirect('/');
            }

        } else {
            Controller_Utility::message("Đã xảy ra lỗi, vui lòng thử lại!");
            Response::redirect('account/my-properties');
        }
    }

    public function action_hide()
    {
        if (Auth::check()) {
            $p_data = array(
                "status" => 0,
            );
            $result = Model_Property::update_properties('property', $p_data, 'id', $this->param('id'));
            if ($result) {
                Controller_Utility::message("Thành công");

                Response::redirect('account/my-properties');
            } else {
                Controller_Utility::message('Xin lỗi bạn không có quyền làm việc này!');
                Response::redirect('/');
            }

        } else {
            Controller_Utility::message("Đã xảy ra lỗi, vui lòng thử lại!");
            Response::redirect('account/my-properties');
        }
    }
    public function action_show()
    {
        if (Auth::check()) {
            $p_data = array(
                "status" => 1,
            );
            $result = Model_Property::update_properties('property', $p_data, 'id', $this->param('id'));
            if ($result) {
                Controller_Utility::message("Thành công");

                Response::redirect('account/my-properties');
            } else {
                Controller_Utility::message('Xin lỗi bạn không có quyền làm việc này!');
                Response::redirect('/');
            }

        } else {
            Controller_Utility::message("Đã xảy ra lỗi, vui lòng thử lại!");
            Response::redirect('account/my-properties');
        }
    }

    public function create_expiration($id_user, $crated_at)
    {
        $result = Model_Users::find($id_user, array('select' => 'account_type'));
        !is_numeric($crated_at) and $crated_at = Date::create_from_string($crated_at)->get_timestamp();
        if ($result['account_type'] == 'basic') {
            $expiration = strtotime('+30 days', $crated_at);
            return $expiration;
        } elseif ($result['account_type'] == 'extended') {
            $expiration = strtotime('+90 days', $crated_at);
            return $expiration;
        } else {
            $expiration = strtotime('+90 days', $crated_at);
            return $expiration;
        }
    }
    public function check_featured_account($id_user)
    {
        $result = Model_Users::find($id_user, array('select' => 'account_type'));
        if ($result['account_type'] == 'extended' || $result['account_type'] == 'professional') {
            return true;
        }
        return false;
    }

    public function action_accept_property()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $p_data = array(
                    "status" => 1,
                );
                $result = Model_Property::update_properties('property', $p_data, 'id', $this->param('id'));
                if ($result) {
                    Controller_Utility::message("Thành công");

                    Response::redirect('admin/approve-properties');
                } else {
                    Controller_Utility::message("Đã xảy ra lỗi, vui lòng thử lại!");
                    Response::redirect('admin/approve-properties');
                }
            } else {
                Controller_Utility::message('Xin lỗi bạn không có quyền làm việc này!');
                Response::redirect('/');
            }
        }
    }

    public function action_delete_property()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $p_data = array(
                    "status" => -1,
                );
                $result = Model_Property::update_properties('property', $p_data, 'id', $this->param('id'));
                if ($result) {
                    Controller_Utility::message("Thành công");

                    Response::redirect('admin/approve-properties');
                } else {
                    Controller_Utility::message("Đã xảy ra lỗi, vui lòng thử lại!");
                    Response::redirect('admin/approve-properties');
                }
            } else {
                Controller_Utility::message('Xin lỗi bạn không có quyền làm việc này!');
                Response::redirect('/');
            }
        }
    }

}
