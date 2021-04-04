<?php

use Fuel\Core\Upload;

class Controller_Utility extends Controller
{
    public static function img_uploads($folder = 'img')
    {
        $config = array(
            'path' => DOCROOT . 'uploads' . DS . $folder . '/',
            'ext_whitelist' => array('gif', 'jpg', 'png'),
            'auto_rename' => false,
            'overwrite' => true,
        );
        Upload::register('validate', function (&$file) {
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
                        break;
                    default:
                }
            }
            return true;
        });
        Upload::process($config);
        if (Upload::is_valid()) {
            Upload::save();
        }
        return true;
    }
    public static function message($str)
    {
        echo "<script type='text/javascript'>alert('" . $str . "');</script>";
    }

}
