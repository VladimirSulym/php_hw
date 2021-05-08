<?php

if (!$_FILES['img']['errors']) {
    $a = new loadFile();
} else {
    echo "Произошла ошибка в загрузке файла";
}

class loadFile
{
    public $arrFile =
        [
            'save_name' => '',
            'orig_name' => '',
            'size' => '',
            'type' => ''
        ];

    public function __construct ()
    {
        $tmp_name = $_FILES['img']['tmp_name'];
        $new_name = md5_file($tmp_name);
        move_uploaded_file($tmp_name, '../imgs'.DIRECTORY_SEPARATOR."$new_name.jpg");
        $this->arrFile['save_name'] = $new_name;
        $this->arrFile['orig_name'] = $_FILES['img']['name'];
        $this->arrFile['size'] = $_FILES['img']['size'];
        $this->arrFile['type'] = $_FILES['img']['type'];

        if ($_FILES['img']['error'] == 0) {
            echo "Файл загружен";
        }
    }
}