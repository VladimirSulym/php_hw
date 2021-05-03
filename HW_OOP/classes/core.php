<?php

class core
{
    public function run ($controller, $action)
    {

        include './app/config/whiteList.php';
        $whiteList = new whiteList();
        $arr_wl = $whiteList->getWhiteList();
        $this->startAction($arr_wl, $controller, $action);
    }

    public function getErrors ($arr_wl, $controller, $action): int
    {
        if (array_key_exists($controller, $arr_wl)){
            if ((in_array($action, $arr_wl[$controller]))) {
                include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."$controller.php";
                $getController = new $controller();
                $getController->{$action}();
                return 0;
            } else {
                include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."errorcontroller.php";
                $getController = new errorcontroller();
                $getController->action404();
                br();
                return 2;
            }
        }  else {
            include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."errorcontroller.php";
            $getController = new errorcontroller();
            $getController->action404();
            br();
            return 1;
        }
    }

    public function startAction ($arr_wl, $controller, $action)
    {
        printArr($arr_wl);
        $errors = $this->getErrors($arr_wl, $controller, $action);
        try {
            switch ($errors) {
                case 1:
                    http_response_code(404);
                    throw new Exception('Controller '.$controller.' NOT exist');
                case 2:
                    http_response_code(404);
                    throw new Exception('Action '.$action.' NOT exist');
                case 0:
                    throw new Exception('Ошибок нет!!');
                default:
                    http_response_code(520);
                    throw new Exception('Не известная ошибка');
            }
        } catch (Exception $e) {
            echo $e->getMessage();br();
        }

    }
//    public function stertAction ($arr_wl, $controller, $action)
//    {
//        printArr($arr_wl);
//        if (array_key_exists($controller, $arr_wl)){
//            if ((in_array($action, $arr_wl[$controller]))) {
//                include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."$controller.php";
//                $getController = new $controller();
//                $getController->{$action}();
//            } else {
//                include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."errorcontroller.php";
//                $getController = new errorcontroller();
//                $getController->action404();
//                br();
//                die ('Action '.$action.' NOT exist');
//            }
//        }  else {
//            include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."errorcontroller.php";
//            $getController = new errorcontroller();
//            $getController->action404();
//            br();
//            die ('Controller '.$controller.' NOT exist');
//        }
//
//    }
}