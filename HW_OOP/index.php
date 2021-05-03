<form method="POST" action="?controller=mainController&action=actionIndex">
    <input type="text" name="name"><br />
    <input type="submit" name="submitOnTop"><br />
</form>

<h3>Загрузка файла</h3>
<br />
<form action="classes/loadFile.php" method="post" enctype="multipart/form-data">
    <input type="file" name="img" />
    <br>
    <input type="submit" name="send" />
</form>

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'app/function/view_function.php';
include 'classes/core.php';

echo ($_REQUEST == $_GET) ?  "GET" : "POST";br();

if ($_REQUEST) {
    include 'classes/request.php';
    $r = request::getInstance();
    echo 'method = '.$r->method;br();
    echo 'controller = '.$r->controller;br();
    echo 'action = '.$r->action;br();
    printArr($r->get);br();
    printArr($r->post);br();
    echo 'FORM = '.$r->form;br();

    $app = new core();
    $app->run($r->controller, $r->action);
};

echo __FILE__;br();
echo dirname(__FILE__);br();
echo __DIR__;
