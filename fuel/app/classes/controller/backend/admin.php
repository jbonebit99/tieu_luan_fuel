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
                    'l_data' => $val->validated(), // login_data Dung o View
                );
                $this->template->title = 'Đăng Nhập';
                $this->template->content = View::forge('frontend\authen/login', $data);
            } else {
                if (empty($val->validated('username'))) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                        'l_data' => $val->validated(), // login_data Dung o View
                    );
                    $data['title'] = "Đăng Nhập";
                    $data['content'] = "Don't show me in the template";
                    return new Response(View::forge('backend/admin/login', $data));
                } elseif (empty($val->validated('password'))) {
                    $data["errors"] = array(
                        'error' => $val->error(), // Chi muc thong bao loi. Se dung o View
                        'l_data' => $val->validated(), // login_data Dung o View
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
                $result = Model_Users::get_all_users();
                $data = array("results" => $result->as_array());
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

    public function action_contact()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                $data["subnav"] = array('index' => 'active');
                $result = Model_Contacts::get_all_contact();
                $data = array("results" => $result->as_array());
                $this->template->title = 'Trang Quản Trị - Liên Hệ';
                $this->template->content = View::forge('backend\admin/contact', $data);
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
        if (Auth::check()) {
            if (Auth::member(100)) {
                $data["subnav"] = array('index' => 'active');
                $this->template->title = 'Trang Quản Trị';
                $this->template->content = View::forge('backend\admin/index', $data);
            } else {
                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }

    public function action_create_blog()
    {
        if (Auth::check()) {
            if (Auth::member(100)) {
                if (Input::method() == "POST") {
                    $config = array(
                        'path' => DOCROOT . 'assets/' . 'img' . '/',
                        'ext_whitelist' => array('gif', 'jpg', 'png'),
                        'auto_rename' => false,
                        'overwrite' => true,
                    );
                    Upload::register('before', function (&$file) {
                        if ($file['error'] == Upload::UPLOAD_ERR_OK) {
                            switch ($file['extension']) {
                                case "jpg":
                                case "png":
                                case "gif":
                                    $checkImage = getimagesize($file['tmp_name']);
                                    $type = $checkImage[2];
                                    if ($checkImage === false) {
                                        return Upload::UPLOAD_ERR_EXT_BLACKLISTED;
                                    } else if ($file['extension'] === 'gif' && $type !== IMAGETYPE_GIF) {
                                        return Upload::UPLOAD_ERR_EXT_BLACKLISTED;
                                    } else if ($file['extension'] === 'png' && $type !== IMAGETYPE_PNG) {
                                        return Upload::UPLOAD_ERR_EXT_BLACKLISTED;
                                    } else if ($file['extension'] === 'jpg' && $type !== IMAGETYPE_JPEG) {
                                        return Upload::UPLOAD_ERR_EXT_BLACKLISTED;
                                    }
                                default:
                            }
                        }
                    });
                    Upload::process($config);
                    if (Upload::is_valid()) {
                        Upload::save();
                        if (Upload::get_files()) {
                            $b_data = array(
                                'title' => Input::post('title'),
                                'sub_description' => Input::post('sub_description'),
                                'content' => urlencode(Input::post('content')),
                                'category' => Input::post('category'),
                                'image' => Upload::get_files()[0]['saved_as'],
                                'tag' => Input::post('tag'),
                                'created_at' => Date::forge()->get_timestamp(),
                                'updated_at' => Date::forge()->get_timestamp(),
                                'status' => 0,
                            );
                            // var_dump($b_data['image']);die;
                            if (Model_Blog::insert_blog('blogs', $b_data)) {
                                $data["validated"] = array(
                                    'error' => "", // Chi muc thong bao loi. Se dung o View submit property
                                    'data' => "",
                                    'message' => "", // data Dung o View
                                );
                                $this->template->title = 'Trang Quản Trị';
                                $this->template->content = View::forge('backend/admin/add_blog', $data);
                            } else {
                                if (File::exists(DOCROOT . DS . "assets/img/" . Upload::get_files()[0]['saved_as'])) {
                                    File::delete(DOCROOT . DS . "assets/img/" . Upload::get_files()[0]['saved_as']);
                                }
                                $data["validated"] = array(
                                    'error' => "", // Chi muc thong bao loi. Se dung o View submit property
                                    'data' => "",
                                    'message' => "", // data Dung o View
                                );
                                $this->template->title = 'Trang Quản Trị';
                                $this->template->content = View::forge('backend/admin/add_blog', $data);
                            }

                        }
                    } else {
                        $data["validated"] = array(
                            'error' => "", // Chi muc thong bao loi. Se dung o View submit property
                            'data' => "",
                            'message' => "", // data Dung o View
                        );
                        $this->template->title = 'Trang Quản Trị';
                        $this->template->content = View::forge('backend/admin/add_blog', $data);
                    }

                } else {
                    $data["subnav"] = array('index' => 'active');
                    $this->template->title = 'Trang Quản Trị';
                    $this->template->content = View::forge('backend/admin/add_blog', $data);
                }
            } else {
                Response::redirect('/');
            }
        } else {
            $data['title'] = "Đăng Nhập";
            return new Response(View::forge('backend/admin/login', $data));
        }
    }

}
