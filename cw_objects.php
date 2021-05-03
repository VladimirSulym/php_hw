<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function console_log($data, $descr = 'PHP:')
{
    $html = "";
    if (is_array($data) || is_object($data)) {
        $html = "<script>console.log('$descr " . json_encode($data) . "');</script>";
    } else {
        $html = "<script>console.log('$descr " . $data . "');</script>";
    }
    echo($html);
}

function printArr(array $array, $isEnd = false)
{
    echo '<pre>';
    print_r($array);
    echo "<br />";
    if ($isEnd) {
        die();
    }
}

function br ()
{
    echo "<br />";
}


/*
//Патерн проектирования "Синглтоне"

include 'classes/singleton.php';

class a
{
    use singleton;
}

$a = a::getInstance();

/*

//Патерн проектирования "Композиция"

class a
{
    private $objB = null;
    private $objC = null;

    public function __construct()
    {
        $this->objB = new b();
        $this->objC = new c();
    }

    public function doWork ()
    {
        $this->objB->printStr();
        $this->objC->printStr();
    }
}

class b
{
    public function printStr ()
    {
        echo 'bbbb';
        br();
    }
}

class c
{
    public function printStr ()
    {
        echo 'cccc';
        br();
    }
}

$a = new a();
$a->doWork();

/*

class loadFile
{
    public $arrFile =
        [
            'save_name' => '',
            'orig_name' => '',
            'size' => '',
            'type' => ''
        ];

    public function a()
    {
        $tmp_name = $_FILES['img']['tmp_name'];
        $new_name = md5_file($tmp_name);
        move_uploaded_file($tmp_name, 'imgs'.DIRECTORY_SEPARATOR."$new_name.jpg");
        $this->arrFile['save_name'] = $new_name;
        $this->arrFile['orig_name'] = $_FILES['img']['name'];
        $this->arrFile['size'] = $_FILES['img']['size'];
        $this->arrFile['type'] = $_FILES['img']['type'];
    }

};

printArr($_FILES);

if (!$_FILES['img']['errors']) {
    $a = new loadFile();
    $a->a();
    printArr($a->arrFile);
} else {
    echo "Произошла ошибка в загрузке файла";
}

 */
