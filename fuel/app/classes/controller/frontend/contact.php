<?php

use Auth\Auth;
use Fuel\Core\Input;
use Fuel\Core\Response;

class Controller_Frontend_Contact extends Controller_Template
{
    public $template = 'template_frontend';

    public function action_index()
    {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Liên Hệ';
        $this->template->subnav = 'contact';
        $this->template->content = View::forge('frontend\contact/index', $data);
    }

    public function action_create()
    {
        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");
        if (Input::method() == 'POST') {
            $postValues = array();
            foreach (Input::post() as $name => $value) {
                $postValues[$name] = trim($value);
            }
            extract($postValues);
            $error = '';
            if (empty($name)) {
                $error = 'Hãy nhập tên của bạn.';
            }
            if (empty($email)) {
                $error = 'Vui lòng nhập Email.';
            } else if (!$this->isEmail($email)) {
                $error = 'Email không hợp lệ. Hãy nhập lại';
            }
            if (empty($subject)) {
                $error = 'Vui lòng nhập tiêu đề';
            }
            if (empty($comments)) {
                $error = 'Vui lòng nhập nội dung.';
            }
            $c_data = array(
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'comments' => $comments,
                'created_at' => Date::forge()->get_timestamp(),
                'status' => 0,
            );
            if (!empty($error)) {
                echo '<div class="contact-error">' . $error . '</div>';
                exit;
            }
            if (Model_Contacts::insert_contacts('contacts', $c_data)) {
                echo "<div class='contact-sent'>Cảm ơn <strong>$name</strong>, Chúng tôi liên hệ với bạn sớm nhất.</div>";
                exit();
            } else {
                echo 'ERROR! Please ensure PHP Mail() is correctly configured on this server.';
                exit();
            }
        } else {
            \Fuel\Core\Response::redirect('/');
            exit();
        }
    }

    public function isEmail($email)
    {
        return (preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
    }

    public function action_delete()
    {
        
        if (Auth::check()) {
            if (Auth::member(100)) {
                $result = Model_Contacts::delete_contact($this->param('id'));
                if ($result) {
                    Controller_Utility::message("Thành công");
                    Response::redirect_back();
                } else {
                    Controller_Utility::message("Đã xảy ra lỗi");
                    Response::redirect_back();
                }
            } else {
                Controller_Utility::message("Xin lỗi bạn không có quyền làm việc này!");
                Response::redirect_back();
            }
        } else {
            Controller_Utility::message("Xin lỗi bạn không có quyền làm việc này!");
            Response::forge('/');
        }
    }
}
