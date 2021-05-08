<form method="POST" action="?controller=restcontroller&action=actionIndex">
    <input type="text" name="name"><br />
    <input type="submit" name="submitOnTop"><br />
</form>
<br />

<!---->
<!--<h3>Загрузка файла</h3>-->
<!--<br />-->
<!--<form action="classes/loadFile.php" method="post" enctype="multipart/form-data">-->
<!--    <input type="file" name="img" />-->
<!--    <br>-->
<!--    <input type="submit" name="send" />-->
<!--</form>-->
<!---->
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'app/function/view_function.php';
//include 'classes/core.php';
spl_autoload_register(function ($className){
    if (file_exists('classes'.DIRECTORY_SEPARATOR."$className.php")) {
        include 'classes'.DIRECTORY_SEPARATOR."$className.php";
    } else echo "нет такого файла";
});
$config = include __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php';

echo ($_REQUEST == $_GET) ?  "GET" : "POST";br();

$msql = new mysql();
$msql->connect($config['db']['local']);
//$msql->query("INSERT INTO catalog (id, title, dt_in, img, brand, colors, category, price, available, img_id, img_url) VALUES ('".$res1['id']."','".$res1['title']."','".$res1['dt_in']."','".$res1['img']."','".$res1['brand']."','".$res1['colors']."','".$res1['category']."','".$res1['price']."','".$res1['available']."','".$res1['img_id']."','".$res1['img_url']."')");
//printArr($msql->querySelect('SELECT * FROM catalog'));
//echo '<pre>';
//print_r($msql);
die();



//if ($_REQUEST) {
//    include 'classes/request.php';
//    $r = request::getInstance();
////    echo 'method = '.$r->method;br();
////    echo 'controller = '.$r->controller;br();
////    echo 'action = '.$r->action;br();
////    var_dump($r->requestPayload);br();
////    printArr($r->get);br();
////    printArr($r->post);br();
////    echo 'FORM = '.$r->form;br();
//
//    $app = new core($config);
//    $app->run($r->method, $r->controller, $r->action, $r->id, $r->requestPayload);
//};


//echo __FILE__;br();
//echo dirname(__FILE__);br();
//echo __DIR__;
