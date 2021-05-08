<?php

class controller
{
    protected $layout = 'index';
    public function __construct ()
    {
    }

    public function renderPage ($data = [])
    {
//        foreach ($data as $var => $value) {
//            $$var = $value;
//        };
        $___PATH_TO_TEMPLATE_213 = core::$config['app_path'].DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'layouts'.DIRECTORY_SEPARATOR.$this->layout.'.php';
        if (!file_exists($___PATH_TO_TEMPLATE_213)) {
            throw new Exception('Template ' .$this->layout . ' not found');
        }
        extract($data);
        ob_start();
        include $___PATH_TO_TEMPLATE_213;
        return ob_get_clean();

    }
}