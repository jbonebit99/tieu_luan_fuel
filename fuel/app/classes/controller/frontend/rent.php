<?php
\Lang::load('lang');
use Auth\Auth;
use Fuel\Core\Controller_Template;

class Controller_Frontend_Rent extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'rent',
            'total_items'    => Model_Property::get_properties('rent')->count(),
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('rent',null, $pagination->per_page, $pagination->offset);
        $data['content'] = array(
            'title' => ucwords(\Lang::get('rent')),
            'properties' => $result->as_array(),
            'subtitle' => 'Danh Sách Tin Cho Thuê');
        $this->template->title = \Lang::get('rent');
        $this->template->subnav='rent';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_ware_housing_for_rent()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'rent/ware-housing',
            'total_items'    => Model_Property::get_properties('rent','ware-housing')->count(),
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('rent','ware-housing', $pagination->per_page, $pagination->offset);
        $data['content'] = array(
            'title' => ucwords(\Lang::get('rent')." ".\Lang::get('ware_housing')),
            'properties' => $result->as_array(),
            'subtitle' =>\Lang::get('listings'),
        );
        $this->template->title =\Lang::get('rent')." ".\Lang::get('ware_housing');
        $this->template->subnav='rent';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }

    public function action_office_for_rent()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'rent/office',
            'total_items'    => 10,
            'per_page'       => 5,
            'uri_segment'    => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::get_properties('rent','office', $pagination->per_page, $pagination->offset);
        $data['content'] = array(
            'title' => ucwords(\Lang::get('rent')." ".\Lang::get('office')),
            'properties' => $result->as_array(),
            'subtitle' => \Lang::get('listings'),
        );
        $this->template->title =\Lang::get('rent')." ".\Lang::get('office');
        $this->template->subnav='rent';
        $this->template->content = View::forge('frontend\sale_rent/index', $data);
    }
    public function action_detail()
    {   

        $featured = Model_Property::get_featured_properties(3);
        $same_properties = Model_Property::get_same_properties();
        $result = Model_Property::get_property_by_id($this->param('id'),$this->param('shape'));
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
            $this->template->title = \Lang::get('details');
            $this->template->subnav = 'rent';
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
            $this->template->title = \Lang::get('preview');
            $this->template->subnav = 'rent';
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
