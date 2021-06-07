<?php
\lang::load('lang');
use Fuel\Core\Controller_Template;
use Fuel\Core\Response;

class Controller_Frontend_Sale extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'sale',
            'total_items'    => Model_Property::get_properties('sale')->count(),
            'per_page'       => 6,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('sale', null, $pagination->per_page, $pagination->offset);
        $data['content'] = array(
            'title' => \Lang::get('sale'),
            'properties' => $result->as_array(),
            'subtitle' =>  \Lang::get('listings')
        );
        $this->template->title =  \Lang::get('sale');
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_lands_for_sale()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'sale/lands',
            'total_items'    => 10,
            'per_page'       => 6,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('sale', 'lands', $pagination->per_page, $pagination->offset);
        $data['content'] = array(
            'title' => ucwords(\Lang::get('sale')." ".\Lang::get('lands')),
            'properties' => $result->as_array(),
            'subtitle' => ucwords( \Lang::get('listings')),
        );
        $this->template->title = ucwords(\Lang::get('sale')." ".\Lang::get('lands'));
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_houses_for_sale()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'sale/lands',
            'total_items'    => Model_Property::get_properties('sale','houses')->count(),
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('sale', 'houses', $pagination->per_page, $pagination->offset);
        $data['content'] = array(
            'title' => ucwords(\Lang::get('sale')." ".\Lang::get('houses')),
            'properties' => $result->as_array(),
            'subtitle' =>  \Lang::get('listings'),
        );
        $this->template->title = ucwords(\Lang::get('sale')." ".\Lang::get('houses'));
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_detail()
    {
        $featured = Model_Property::get_featured_properties(3);
        $same_properties = Model_Property::get_same_properties();
        $result = Model_Property::get_property_by_id($this->param('id'), $this->param('shape'));
        $result_arr = array();
        foreach ($result as $item) {
            $result_arr = $item;
        }
        if ($result->count() > 0) {
            $data['content'] = array(
                'properties' => $result_arr,
                'featured'=>$featured->as_array(),
                'same_properties'=>  $same_properties->as_array(),
            );
            $this->template->title =  \Lang::get('details');
            $this->template->subnav = 'sale';
            $this->template->content = View::forge('frontend\sale_rent/details', $data);
        } else {
            Response::redirect('/');
        }
    }

    public function action_detail_preview()
    {
       if (Auth::check())
       {
        $featured = Model_Property::get_featured_properties(3);
        $same_properties = Model_Property::get_same_properties();
        $result = Model_Property::get_properties_preview_by_id($this->param('id'),$this->param('shape'));
        $result_arr = array();
        foreach($result as $item)
        {
            $result_arr = $item;
        }
        if ($result->count() > 0) {
            $data['content'] = array(
                'properties' => $result_arr,
                'featured'=>$featured->as_array(),
                'same_properties'=>  $same_properties->as_array(),
            );
            $this->template->title =  \Lang::get('preview');
            $this->template->subnav = '';
            $this->template->content = View::forge('frontend\sale_rent/details', $data);
        } else {
            Response::redirect('/');
        }
       }
       else {
        Response::redirect('/');
       }
    }
}
