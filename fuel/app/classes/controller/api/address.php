<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;

class Controller_Api_Address extends Controller_Rest
{

    public $rest_format = 'json';

    public function post_Province()
    {
        $_province = Model_Api_Address::get_Province();
        $data = array();
        foreach ($_province as $p) {
            $data[] = array(
                'id' => $p['id'],
                '_name' => $p['_name']
            );
        }
        return $this->response(
            array(
                'status' => 200,
                'success' => true,
                'data' => $data
            )
        );
    }

    public function post_District()
    {
        $_district = Model_Api_Address::get_District(Input::param('province_id'));
        $data = array();
        foreach ($_district as $d) {
            $data[] = array(
                'id' => $d['id'],
                '_name' => $d['_name']
            );
        }
        if ($_district->count() > 0) {
            return $this->response(
                array(
                    'status' => 200,
                    'success' => true,
                    'data' => $data
                )
            );
        } else {
            return $this->response(
                array(
                    'status' => 200,
                    'success' => false,
                    'data' => $data
                )
            );
        }
    }

    public function post_Ward()
    {
        $_ward = Model_Api_Address::get_Ward(Input::param('district_id'));
        $data = array();
        foreach ($_ward as $w) {
            $data[] = array(
                'id' => $w['id'],
                '_name' => $w['_name']
            );
        }
        if ($_ward->count() > 0) {
            return $this->response(
                array(
                    'status' => 200,
                    'success' => true,
                    'data' => $data
                )
            );
        } else {
            return $this->response(
                array(
                    'status' => 200,
                    'success' => false,
                    'data' => $data
                )
            );
        }
    }
}
