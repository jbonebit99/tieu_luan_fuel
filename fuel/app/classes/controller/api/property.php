<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;
use Fuel\Core\View;

class Controller_Api_Property extends Controller_Rest
{
    public $rest_format = 'json';
    public function post_hidden()
    {
        if (Input::method() == 'POST') {
            $result = Model_Api_Property::update_status_properties(Input::param('id_properties'));
            if ($result) {
                return $this->response(
                    array(
                        'status' => 200,
                        'success' => true,
                    )
                );
            } else {
                return $this->response(
                    array(
                        'status' => 200,
                        'success' => false,
                    )
                );
            }
        }
        return $this->response(
            array(
                'status' => 200,
                'success' => false,
            )
        );
    }
    public function post_sort()
    {
        
        $param = rtrim(\Input::param('param'),'/');
        $param = explode('/', trim($param));
        unset($param[0]);
        if (isset($param[2]))
        {
            $param[2];
        }
       
        return $this->response(
            array(
                'status' => 200,
                'success' => true,
                'data'=>$param,
            )
        );
    }

   
}
