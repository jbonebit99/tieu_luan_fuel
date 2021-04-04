<?php

return array(
    'paths' =>
        array(
            0 => 'assets/',
        ),
    'img_dir' => 'img/',
    'js_dir' => 'js/',
    'css_dir' => 'css/',
    'folders' =>
        array(
            'css' =>
                array('assets/css', 'assets/plugins'),
            'js' =>
                array('assets/js', 'assets/plugins'),
            'img' =>
                array('assets/img', 'assets/'),
        ),
    'url' => \Config::get('base_url'),
    'add_mtime' => true,
    'indent_level' => 1,
    'indent_with' => '	',
    'auto_render' => true,
    'fail_silently' => false,
    'always_resolve' => false,
);

/* End of file asset.php */
