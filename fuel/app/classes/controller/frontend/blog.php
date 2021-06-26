<?php
\Lang::load('lang');
class Controller_Frontend_Blog extends Controller_Template
{
    public $template = 'template_frontend';
    public function action_index()
    {
        $config = array(
            'pagination_url' => \Config::get('base_url') . 'blog',
            'total_items' => Model_Blog::query()->where('status', 1)->order_by('created_at', 'desc')->count(),
            'per_page' => 5,
            'uri_segment' => 'page',
        );
        $pagination = Paginationapp::forge('my_pagination', $config);
        $result = Model_Blog::get_blogs($pagination->per_page, $pagination->offset);
		$result_random = Model_Blog::get_blogs_random();
        $data['content'] = array(
            'title' => 'Bài viết',
            'blogs' => $result->as_array(),
            'subtitle' => 'Danh sách bài viết',
			'random'=>$result_random->as_array()
        );
        $this->template->title = ucwords(\Lang::get('blog'));
        $this->template->subnav = 'blog';
        $this->template->content = View::forge('frontend/blog/index', $data);
    }

    public function action_view()
    {
        $result = Model_Blog::get_blog($this->param('id'));
        $result_arr = array();
        if ($result->count() > 0) {
            foreach ($result as $item) {
                $result_arr = $item;
            }
            $result_comment = Model_Comment::get_comments($this->param('id'));
			$result_random = Model_Blog::get_blogs_random();
            $data['content'] = array(
                'title' => 'Chi tiết bài viết',
                'content' => $result_arr,
                'subtitle' => $result->as_array()[0]['category'],
                'comments' => $result_comment->as_array(),
                'count_comment' => $result_comment->count(),
				'random'=>$result_random->as_array()
            );
            $this->template->title = ucwords(\Lang::get('blog'));
            $this->template->subnav = 'blog';
            $this->template->content = View::forge('frontend/blog/detail', $data);
        } else {
            Response::redirect('404');
        }

    }

    public function action_comment()
    {
        if (Input::method() == 'POST') {
            $c_data = array(
                'name' => Input::post('name'),
                'email' => Input::post('email'),
                'content' => Input::post('comment'),
                'parent_id' => 0,
                'id_post' => Input::post('id'),
                'created_at' => Date::forge()->get_timestamp(),
                'updated_at' => Date::forge()->get_timestamp(),
                'status' => 1,
            );
            if (Model_Comment::insert_comment('comment', $c_data)) {
                Response::redirect('/blog/view/' . Input::post('id'));
            } else {
                die("1232");
                Response::redirect_back();
            }
        } else {
            Response::redirect('/');
        }
    }

    public function action_search()
    {
        if (Input::method() == 'POST') {
            $config = array(
                'pagination_url' => \Config::get('base_url') . 'blog/search',
                'total_items' => Model_Blog::search_blogs(Input::post('key'))->count(),
                'per_page' => 5,
                'uri_segment' => 'page',
            );
            $pagination = Paginationapp::forge('my_pagination', $config);
            $result = Model_Blog::search_blogs(Input::post('key'), $pagination->per_page, $pagination->offset);
            $data['content'] = array(
                'title' => 'Kết quả tìm kiếm',
                'blogs' => $result->as_array(),
                'subtitle' => 'Có ' . $result->count() . ' kết quả được tìm thấy với từ khóa: "' . Input::post('key').'"',
            );
            $this->template->title = ucwords(\Lang::get('blog'));
            $this->template->subnav = 'blog';
            $this->template->content = View::forge('frontend/blog/index', $data);
        } else {

        }
    }

}
