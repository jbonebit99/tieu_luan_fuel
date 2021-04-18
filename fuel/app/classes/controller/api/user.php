<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;

class Controller_Api_User extends Controller_Rest
{

    public function post_Email_Username()
    {
        if (Input::method() == 'POST') {
            $username = (Input::param('username')) ? Input::param('username') : '';
            $email = (Input::param('email')) ? Input::param('email') : '';
            $data = Model_Api_Users::get_same_user($username, $email, 'users');
            $a_data = $data->current();

            if ($data->count() > 0) {
                if ($a_data['email'] == $email) {
                    return $this->response(array(
                        'value' => 'Email'
                    ));
                } else if ($a_data['username'] == $username) {
                    return $this->response(array(
                        'value' => 'Username'
                    ));
                }

            }
        }
        return $this->response(
            array(
                'status' => 200,
                'success' => false,
                'data' => ''
            ));
    }
}
