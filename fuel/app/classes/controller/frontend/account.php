<?php

use Auth\Auth;
use Fuel\Core\Controller_Template;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Upload;

class Controller_Frontend_Account extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        if (Auth::check()) {
            list($driver, $id_user) = Auth::get_user_id();
            if (Input::method() == 'POST') {
                $file = Input::file('avatar');
                if ($file['name'] != '') {
                    if (Controller_Utility::img_uploads('avatar')) {
                        $old_avatar_result = Model_Account::get_avatar_user($id_user); // Lay ten file avatar cu trong database
                        $old_avatar = '';
                        foreach ($old_avatar_result->as_array() as $value) {
                            $old_avatar = $value['avatar']; //
                        }
                        //Xoa Avatar Cu
                        if (File::exists(DOCROOT . DS . "uploads/avatar/" . $old_avatar)) {
                            File::delete(DOCROOT . DS . "uploads/avatar/" . $old_avatar);
                        }
                        $info_user_data_avatar = array();
                        foreach (Upload::get_files() as $file) {
                            $info_user_data_avatar['avatar'] = $file['saved_as'];
                        }
                        if (!empty($info_user_data_avatar)) {
                            Model_Account::update_info_user('info_user', $info_user_data_avatar, $id_user);
                        }
                    }

                }
                $info_user_data = array(
                    'name' => Input::param('name'),
                    'title' => Input::param('title'),
                    'about_me' => Input::param('about_me'),
                    'phone' => Input::param('phone'),
                );

                $social_user_data = array(
                    'facebook' => Input::param('facebook'),
                    'twitter' => Input::param('twitter'),
                    'google_plus' => Input::param('google_plus')
                );
                if (Model_Account::update_info_user('info_user', $info_user_data, $id_user) && Model_Account::update_social_user('social_user', $social_user_data, $id_user)) {
                    $result = Model_Account::get_all_info_user($id_user);
                    foreach ($result->as_array() as $info) {
                        $data["info_user"] = array(
                            'info' => $info,
                        );
                    }
                    $this->template->title = 'Tài Khoản';
                    $this->template->subnav = '';
                    $this->template->content = View::forge('frontend\account/index', $data);
                } else {
                    Session::set_flash('error_save_change');
                    Response::redirect('account/my-profile');
                }
            } else {
                $result = Model_Account::get_all_info_user($id_user);
                foreach ($result->as_array() as $info) {
                    $data["info_user"] = array(
                        'info' => $info,
                    );
                }
                $this->template->title = 'Tài Khoản';
                $this->template->subnav = '';
                $this->template->content = View::forge('frontend\account/index', $data);
            }
        } else {
            Response::redirect('/');
        }

    }

    public function action_my_bookmarks()
    {
        if (Auth::check()) {
            $data["subnav"] = array('index' => 'active');
            $this->template->title = 'Yêu Thích';
            $this->template->subnav = '';
            $this->template->content = View::forge('frontend\account/my_bookmarks', $data);
        } else {
            Response::redirect('/');
        }

    }

    public function action_change_password()
    {
        if (Auth::check()) {
            $data = array();
            $this->template->title = 'Thay Đổi Mật Khẩu';
            $this->template->subnav = '';
            $this->template->content = View::forge('frontend\account/change_password', $data);
        } else {
            Response::redirect('/');
        }

    }

    public function action_my_properties()
    {
        if (Auth::check()) {
            list($driver, $id_user) = Auth::get_user_id();
            $result = Model_Property::get_properties_by_user($id_user);
            $data["content"] = array(
                'properties' => $result->as_array(),
            );
            $this->template->title = 'Tin Đăng Của Tôi';
            $this->template->subnav = '';
            $this->template->content = View::forge('frontend\account/my_properties', $data);
        } else {
            Response::redirect('/');
        }
    }


}
