<?php

class Controller_Frontend_Search extends Controller_Template
{
	public $template="template_frontend";
    public function action_index()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'search',
            'total_items' => Model_Property::get_properties(Input::post('key'),Input::post('shape'),Input::post('type'))->count(),
            'per_page' => 5,
            'uri_segment' => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Property::search_property(Input::post('key'),Input::post('tab'),Input::post('type'),$pagination->per_page, $pagination->offset);
		$data['content'] = array(
            'title' => ucwords("Tìm kiếm"),
            'properties' => $result->as_array(),
            'subtitle' => "Có " . $result->count() . " kết quả phù hợp với từ khóa: " . Input::post('key'),
			'key'=>Input::post('key')
        );
        $this->template->title = ucwords(\Lang::get('sale') . " " . \Lang::get('houses'));
        $this->template->subnav = 'sale';
        $this->template->content = View::forge('frontend/sale_rent/index', $data);
    }

}
