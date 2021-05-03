<?php

include 'classes/singleton.php';

class request
{
    use singleton;
    public $method = '';
    public $controller = '';
    public $action = '';
    public $get = [];
    public $post = [];
    public $form = false;
    public $requestPayload = [];

    private function __construct () {
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($_GET) {
            $this->controller = strtolower( (isset($_GET['controller']))?"{$_GET['controller']}":'');
            $this->action = strtolower((isset($_GET['action']))?"{$_GET['action']}":'');
            $this->get = $_GET;
        }
        if ($this->method == 'POST') {
            $this->post = $_POST;
            foreach ($this->post as $key => $value) {
                if ('submit' === substr($key, 0, 6)) {
                    $this->form = true;
                    break;
                }
            }
        }
        $this->setRequestPayload();
        unset($this->get['controller'], $this->get['action']);
    }

    private function setRequestPayload () {
        $inputString = '';
        $std = fopen('php://input', 'r');

        while ($buf = fread($std, 100)) {
            $inputString .=$buf;
        }
        fclose($std);
        $this->requestPayload = json_decode($inputString, true);
    }
}