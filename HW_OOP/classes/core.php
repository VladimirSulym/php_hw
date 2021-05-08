<?php

spl_autoload_register(function ($className){
    if (file_exists('app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."$className.php")) {
        include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."$className.php";
    } else echo "нет такого файла";
});
include './app/config/main.php';

class core
{
    public static $config = [];

    public function __construct ($config=[])
    {
        self::$config = $config;
    }

    public function run ($method, $controller, $action, $id, $requestPayload)
    {
        try {
            switch ($method) {
                case 'GET':
                    include './app/config/whiteList.php';
                    $whiteList = new whiteList();
                    $whiteList = $whiteList->getWhiteList();
                    $this->startAction($whiteList, $controller, $action, $id);
                    break;
                case 'POST':
                    include './app/config/whiteList.php';
                    $whiteList = new whiteList();
                    $whiteList = $whiteList->getWhiteList();
                    if ($controller == 'restcontroller'){
                        $getController = new $controller();
                        $getController->actionCreate($requestPayload);
                    } else {
//                        $getController = new errorcontroller();
//                        $getController->action404();
                        http_response_code(404);
                        throw new Exception('Invalid controller name');
                    }
                    break;
                case 'PUT':
                    break;
                case 'DELETE':
                    break;
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }

    }

    public function getErrors ($whiteList, $controller, $action, $id)
    {
        if (array_key_exists($controller, $whiteList)){
            if ((in_array($action, $whiteList[$controller]))) {
               // include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."$controller.php";
                $getController = new $controller();
                $getController->{$action}();
//                return 0;
//                throw new Exception('Ошибок нет!!');
            } else { if ((in_array($id, $whiteList[$controller]))) {
                $getController = new $controller();
                $getController->actionView();
            } else {
                //  include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."errorcontroller.php";
                $getController = new errorcontroller();
                $getController->action404();
                br();
//                return 2;
                http_response_code(404);
                throw new Exception('Action or ID'.$action.' NOT exist');
            }
            }
        }  else {
//            include 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR."errorcontroller.php";
            $getController = new errorcontroller();
            $getController->action404();
            br();
//            return 1;
            http_response_code(404);
            throw new Exception('Controller '.$controller.' NOT exist');
        }
    }

    public function startAction ($whiteList, $controller, $action, $id)
    {
        try {
            $this->getErrors($whiteList, $controller, $action, $id);
//            switch ($errors) {
//                case 1:
//                    http_response_code(404);
//                    throw new Exception('Controller '.$controller.' NOT exist');
//                case 2:
//                    http_response_code(404);
//                case 0:
//                    throw new Exception('Ошибок нет!!');
//                default:
//                    http_response_code(520);
//                    throw new Exception('Не известная ошибка');
//            }
        } catch (Exception $e) {
            echo $e->getMessage();br();
        }

    }
//    public function startAction ($arr_wl, $controller, $action)
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