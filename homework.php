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




// 3 домашнее задание - Реализовать роутинг по php-объектам
//http://wd7/?c=controller&a=action
//Создать в корне сервера директорию controllers. в нее добавить файл(можно несколько),
// в нем разместить 1 класс. В классе реализовать несколько методов
//Реализовать механизм, извлекающий 2 GET-параметра (например controller и action),
// на основе controller создать экземпляр класса из дериктории controllers и запустить метод,
// извлеченный из GET-параметра action.

include 'controllers'.DIRECTORY_SEPARATOR.'contr1.php';
include 'controllers'.DIRECTORY_SEPARATOR.'contr2.php';

echo printArr($_GET);
$con = $_GET['c'];
$act = $_GET['a'];

//$con::{$act}(); //вариант для статической функции

$a = new $con;
$a->{$act}();


/*
// 2 домашнее задание - Создание бинарного дерева
// Реализовать заполнение бинарного дерева и поиска значения в нем

$a = [12,3,2,5,62,34,7,4,16,43,9,8,6,0]; //первичные данные для заполнения дерева
$b = [];

foreach ($a as $item) {

    $startPosition = 0;
    $finishPosition = count($b)-1;
    $position = 0;
    $sdvig = 0;
    $flag = 0;

    while ($flag < 1) {

        if (count($b)) {
            if ($finishPosition - $startPosition == 1 || $finishPosition - $startPosition == 0) {
                if ($b[$startPosition] >= $item) {
                    array_splice($b, $startPosition, 0, $item);
                    $flag = 1;
                } else {
                    if ($b[$finishPosition] <= $item) {
                        array_splice($b, $finishPosition + 1, 0, $item);
                        $flag = 1;
                    } else {
                        array_splice($b, $finishPosition, 0, $item);
                        $flag = 1;
                    }
                }
            } else {
                if (($finishPosition - $startPosition) % 2) {
                    $sdvig = $finishPosition - $startPosition + 1;
                } else {
                    $sdvig = $finishPosition - $startPosition;
                }

                $position = $sdvig / 2 + $startPosition;

                if ($b[$position] < $item) {
                    $startPosition = $position;
                } else {
                    $finishPosition = $position;
                }
            }
        } else {
            $b[0] = $item;
            $flag = 1;
        }
        printArr($b);
    }
}


$desiredValue = 16; // искомое значение в дереве
$startPosition = 0;
$finishPosition = count($b)-1;
$flag = 0;

while ($flag < 1) {

    if (count($b)) {
        if ($finishPosition - $startPosition == 1 || $finishPosition - $startPosition == 0) {
            if ($b[$startPosition] == $desiredValue) {
                echo "Искомое значение -> ".$desiredValue." находится на позиции ".$startPosition;
                $flag = 1;
            } else {
                if ($b[$finishPosition] == $desiredValue) {
                    echo "Искомое значение -> " . $desiredValue . " находится на позиции " . $finishPosition;
                    $flag = 1;
                } else {
                    echo "Искомое значение отсутствует!!";
                    $flag = 1;
                }
            }
        } else {
            if (($finishPosition - $startPosition) % 2) {
                $sdvig = $finishPosition - $startPosition + 1;
            } else {
                $sdvig = $finishPosition - $startPosition;
            }

            $position = $sdvig / 2 + $startPosition;

            if ($b[$position] < $desiredValue) {
                $startPosition = $position;
            } else {
                $finishPosition = $position;
            }
        }
    } else {
        echo "Массив пустой";
        $flag = 1;
    }
}

/*
// 1 домашнее задание - Метод сортировки пузырьком (проверяем в Браузере)

$a = [1,323,2,5,6234,7,2,3,423,9,0,6,0];
$cnt = count($a);
for ($i = 0; $i < $cnt; $i++) {
    for ($j=$i; $j < $cnt; $j++) {
        if ($a[$i] > $a[$j]) {
            [$a[$i],$a[$j]]=[$a[$j],$a[$i]]; //упращенный вариант перестановки элементов в массиве аналогично 3м строкам ниже
//            $b = $a[$i];
//            $a[$i]=$a[$j];
//            $a[$j]=$b;
        }
    }
}

printArr($a);
*/
