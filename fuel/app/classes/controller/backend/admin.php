<?php

use Auth\Auth;
use Fuel\Core\Input;
use Fuel\Core\Validation;
use Fuel\Core\View;

class Controller_Backend_Admin extends Controller_Template
{
    public $template = 'template_backend';

    public function action_index()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $data["subnav"] = array('index' => 'active');
                $this->template->title = 'Trang Quản Trị';
                $this->template->content = View::forge('backend\admin/dashboard', $data);
            } else {
                Controller_Utility::message("Không Vào Được Đâu Bạn Ơi!");
                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            $data['content'] = "Don't show me in the template";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }


    public function action_login()
    {
        if (Input::method() == 'POST') {
            $val = Validation::forge('form_login_admin');
            $val->add_field('username', 'Tài Khoản hoặc Email', 'required|min_length[3]|max_length[50]');
            $val->add_field('password', 'Mật Khẩu', 'required|min_length[6]|max_length[50]');
            $val->set_message('required', 'Trường :label  này là bắt buộc');
            $val->set_message('max_length', ':label tối đa :param:1 ký tự');
            $val->set_message('min_length', ':label cần ít nhất :param:1 ký tụ');
            if (!$val->run()) {
                $data["errors"] = array(
                    'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                    'l_data' => $val->validated() // login_data Dung o View
                );
                $this->template->title = 'Đăng Nhập';
                $this->template->content = View::forge('frontend\authen/login', $data);
            } else {
                if (empty($val->validated('username'))) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                        'l_data' => $val->validated() // login_data Dung o View
                    );
                    $data['title'] = "Đăng Nhập";
                    $data['content'] = "Don't show me in the template";
                    return new Response(View::forge('backend/admin/login', $data));
                } elseif (empty($val->validated('password'))) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                        'l_data' => $val->validated() // login_data Dung o View
                    );
                    $data['title'] = "Đăng Nhập";
                    return new Response(View::forge('backend/admin/login', $data));
                } else {
                    $auth = Auth::instance();
                    if ($auth->login($val->validated('username'), $val->validated('password'))) {
                        if (Input::param('remember', false)) {
                            Auth::remember_me();
                        } else {
                            Auth::dont_remember_me();
                        }
                        if (Auth::member(100)) {
                            Response::redirect('admin');
                        } else {
                            Response::redirect('/');
                        }
                    } else {
                        Session::set_flash('error', 'Sai Tên Tài Khoản Hoặc Mật Khẩu');
                        Response::redirect('admin/login');
                    }
                }
            }
        } else {
            $data['title'] = "Đăng Nhập";
            $data['content'] = "Don't show me in the template";
            return new Response(View::forge('backend/admin/login', $data));
        }

    }

    public function action_logout()
    {
        if (Auth::check()) {
            Auth::dont_remember_me();
            Auth::logout();
            Response::redirect('admin/login');
        } else {
            Response::redirect('/');
        }
    }

    public function action_profile()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $data["subnav"] = array('index' => 'active');
                $this->template->title = 'Trang Quản Trị';
                $this->template->content = View::forge('backend\admin/profile', $data);
            } else {

                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }

    public function action_approve_properties()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $result = Model_Property::get_properties_by_status(0);
                $data = array("results" => $result->as_array());
                $this->template->title = 'Trang Quản Trị';
                $this->template->content = View::forge('backend\admin/approve-properties', $data);
            } else {
                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }

    public function action_detail()
    {

        if (Auth::check()) {
            if (Auth::member(100)) {
                $data["subnav"] = array('index' => 'active');
                $this->template->title = 'Trang Quản Trị';
                $this->template->content = View::forge('backend\admin/detail-property', $data);
            } else {
                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }

    public function action_users()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $data["subnav"] = array('index' => 'active');
                $this->template->title = 'Trang Quản Trị';
                $this->template->content = View::forge('backend\admin/users', $data);
            } else {
                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }

    public function action_blogs()
    {

    }

    public function action_create_blog()
    {

    }
}
