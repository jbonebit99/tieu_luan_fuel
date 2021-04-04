<?php

use Auth\Auth;
use Fuel\Core\Controller_Template;
use Fuel\Core\DB;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Validation;
use Fuel\Core\View;

class Controller_Frontend_Authen extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_login()
    {
        if (Auth::check()) {
            Response::redirect_back('account/my-profile');
        }
        if (Input::method() == 'POST') {
            $val = Validation::forge('form_login');
            $val->add_field('username', 'Tài Khoản hoặc Email', 'required|min_length[3]|max_length[50]');
            $val->add_field('password', 'Mật Khẩu', 'required|min_length[6]|max_length[50]');
            $val->set_message('required', 'Trường :label  này là bắt buộc');
            $val->set_message('max_length', ':label tối đa :param:1 ký tự');
            $val->set_message('min_length', ':label cần ít nhất :param:1 ký tụ');
            // check the credentials.
            if (!$val->run()) {
                $data["errors"] = array(
                    'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                    'l_data' => $val->validated() // login_data Dung o View
                );
                $this->template->title = 'Đăng Nhập';
                $this->template->subnav='';
                $this->template->content = View::forge('frontend\authen/login', $data);
            } else {
                if (empty($val->validated('username'))) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                        'l_data' => $val->validated() // login_data Dung o View
                    );
                    $this->template->title = 'Đăng Nhập';
                    $this->template->subnav='';
                    $this->template->content = View::forge('frontend\authen/login', $data);
                } elseif (empty($val->validated('password'))) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                        'l_data' => $val->validated() // login_data Dung o View
                    );
                    $this->template->title = 'Đăng Nhập';
                    $this->template->subnav='';
                    $this->template->content = View::forge('frontend\authen/login', $data);
                } else {
                    $auth = Auth::instance();
                    if ($auth->login($val->validated('username'), $val->validated('password'))) {
                        if (Input::param('remember', false)) {
                            Auth::remember_me();
                        } else {
                            Auth::dont_remember_me();
                        }
                        Response::redirect('account/my-profile');
                    } else {
                        Session::set_flash('error', 'Sai Tên Tài Khoản Hoặc Mật Khẩu');
                        Response::redirect('authen/login');
                    }
//                    Session::set_flash('error', 'Không Được Để Trống Bạn Ơi! ');
//                    Response::redirect('authen/login');
                }
            }
        } else {
            $data["errors"] = array(
                'error' => '', //error chi muc loi
                'l_data' => '' // register_data
            );
            $this->template->title = 'Đăng Nhập';
            $this->template->subnav='';
            $this->template->content = View::forge('frontend\authen/login', $data);
        }
    }

    public function action_logout()
    {
        if (Auth::check()) {
            Auth::dont_remember_me();
            Auth::logout();
            Response::redirect('authen/login');
        } else {
            Response::redirect('/');
        }

    }

    public function action_register()
    {
        if (Auth::check()) {
            Response::redirect('account/my-profile');
        }
        if (Input::method() == 'POST' && Input::post('submit_register')) {
            $val = Validation::forge('form_register');
            $val->add_callable(new MyRules()); // Them Class Valaidate, de kiem tra
            //Thiet lập các Validate
            $val->add('username_register', 'Tên Đăng Nhập', array(), array('trim', 'strip_tags', 'required'))
                ->add_rule('unique_username', 'users.username')
                ->add_rule('required')
                ->add_rule('min_length', 6)
                ->add_rule('max_length', 50);
            $val->add('email_register', 'Email', array(), array('trim', 'strip_tags', 'required'))
                ->add_rule('unique_email', 'users.email')
                ->add_rule('valid_email');
            $val->add('password_register', 'Mật Khẩu', array(), array('required', 'trim'))
                ->add_rule('min_length', 6)
                ->add_rule('max_length', 200);
            $val->add('password_confirm', 'Xác Nhận Mật Khẩu', array(), array('required', 'trim'))
                ->add_rule('match_value', Input::param('password_register'))
                ->add_rule('min_length', 6)
                ->add_rule('max_length', 200);
//            Dat Thong Bao Loi
            $val->set_message('unique_username', ':label đã được sử dụng, hãy sử dụng :label khác');
            $val->set_message('unique_email', ':label đã được sử dụng, hãy sử dụng :label khác');
            $val->set_message('required', 'Trường :label này là bắt buộc');
            $val->set_message('min_length', ':label cần ít nhất :param:1 ký tự');
            $val->set_message('match_value', 'Mật Khẩu Không Khớp');

            if (!$val->run()) {
                $data["errors"] = array(
                    'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                    'r_data' => $val->validated() // register_data Dung o View
                );
                $this->template->title = 'Đăng Ký';
                $this->template->subnav='';
                $this->template->content = View::forge('frontend\authen/register', $data);
            } else {
                $auth = Auth::instance();
                $create_user = $auth->create_user(
                    $val->validated('username_register'),
                    $val->validated('password_register'),
                    $val->validated('email_register'),
                    1,
                    array(
                        'fullname' => 'A. New User'
                    )
                );
                if ($create_user) {
                    $id_user = Model_Users::find_last_id(); //Tim ID vua insert, dung để làm id_user
                    Model_Account::insert_info_user('info_user', array(
                        'name' => 'Người Dùng Cơ Bản',
                        'title' => 'Kinh Doanh Bất Động Sản Tại Cần Thơ',
                        'about_me' => 'Một người mới vừa sủ dụng website',
                        'avatar' => '',
                        'phone' => '',
                        'id_user' => $id_user,
                        'status' => 1
                    ));
                    Model_Account::insert_info_user('social_user', array(
                        'id_user' => $id_user,
                        'facebook' => 'https://facebook.com/',
                        'twitter' => 'https://www.twitter.com/',
                        'google_plus' => 'https://www.google.com/',
                        'status' => 1
                    ));
                    Session::set_flash('success', 'Welcome');
                    Response::redirect('authen/login');
                } else {
                    Session::set_flash('error', 'Error');
                    Response::redirect('authen/register');
                }
            }
        } else {
            $data["errors"] = array(
                'error' => '', //error chi muc loi
                'r_data' => '' // register_data
            );
            $this->template->title = 'Đăng Ký';
            $this->template->subnav='';
            $this->template->content = View::forge('frontend\authen/register', $data);
        }
    }

    public function action_lost_password()
    {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Đăng Ký';
        $this->template->content = View::forge('frontend\authen/lost-password', $data);
    }


}
