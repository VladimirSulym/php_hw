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



// IV) функции
// 1. Реализовать алгоритм аналогичный PHP-функции implode через foreach
// 2. Реализовать алгоритм аналогичный PHP-функции explode через свою функцию
// 3. Реализовать логику цикла foreach средствами цикла for, while (массив ассоциативный)

$arr = [
    'aqe' => 'asdasd',
    'b'=> 'akhsbd',
    'asdfsg',
    'd'=>'jhbdhj',
    'fjshdfj'
];

echo "Результат implode -> ".implode('----',$arr);
br();

$myStr = '';
$separator = '----';
$i = 0;
foreach ($arr as $k => $item) $i++ == count($arr)-1 ? $myStr = $myStr . $item : $myStr = $myStr . $item . $separator;
echo "Результат implode через foreach -> ".$myStr;
br();

echo "Результат explode - ";
br();
printArr(explode($separator, $myStr));
br();

function myExplode ($separator, $myStr)
{
    $arr = [];
    while (strlen($myStr)>0) {
        if (strpos($myStr, $separator)) {
            array_push($arr, substr($myStr, 0, strpos($myStr, $separator)));
            $myStr = substr($myStr, strpos($myStr, $separator)+strlen($separator),strlen($myStr)-strlen($separator));
        } else {
            array_push($arr , $myStr);
            $myStr = '';
        }
    }
    return $arr;
}

echo "Результат функции myExplode - ";
br();
printArr(myExplode($separator, $myStr));
br();

function myForeachFor ($arr)
{
    reset($arr);
    for ($i = 0; $i < count($arr); $i++) {
        echo key($arr).' - '.current($arr);
        br();
        next($arr);
    }
}
echo "Результат функции myForeachFor - ";
br();
myForeachFor($arr);
br();

function myForeachWhile ($arr)
{
    $i = 0;
    while ($i < count($arr)) {
        echo key($arr).' - '.current($arr);
        br();
        next($arr);
        $i++;
    }
}

echo "Результат функции myForeachWhile - ";
br();
myForeachWhile($arr);

/*
// III) циклы
// 1. Вывести числа от 0 до $a=15 через for
// 2. Вывести числа от $a до 0 через for
// 3. Вывести числа от 0 до $a=15 через while
// 4. С помощью цикла do while найти первое значение которого нет в массиве
// 5.

$a = 15;

for ($i = 0; $i <= $a; $i++) {
    echo $i;
    br();
}
br();

for ($i = $a; $i >= 0; $i--) {
    echo $i;
    br();
}
br();

$i = 0;
while ($i <= $a) {
    echo $i;
    br();
    $i++;
}
br();

$tokenBase = [1,8,2,5,6,7];
$token = 1;

do {
    if (!in_array($token, $tokenBase)) {
        echo $token;
        break;
    } else $token++;
} while ($token);
br();

$a = 363;
$b = md5($a);
echo $b;
br();
echo substr($b, 1,1);
br();

for ($i = 0; $i <=100; $i++) {
    if (substr(md5($i), 1,1) == "0") {
        echo "эта цифра -> ".$i;
        br();
        sleep(1);
    };
}

/*
// II) условия
// 1. Вывести на экран YES если попала четное число и NO если не четное использовать оператор деления по модулю
// 2. Вывести на экран FOO если число делится на 3
//    вывести на экран BAR если число делится на 5
//    вывести на экран FOOBAR если число делится и на 3 и на 5
// 3. Повторить задание два с массивом чисел

$a = random_int (1, 90000);

if ($a%2 == 0) {
    echo $a." YES";
} else echo $a." NO";
br();

echo $a%2 == 0 ? $a." YES" : $a." NO"; // Аналогичное решение одной строчкой
br();

$b = random_int(0, 100);

if ($b % 3 == 0) { // 1 Вариант
    if ($b % 5 == 0) {
        echo $b." FOOBAR";
    } else echo $b." FOO";
} elseif ($b % 5 == 0) echo $b." BAR";
br();

switch ($b) { // 2 Вариант
    case ($b % 3 == 0 && $b % 5 == 0):
        echo $b." FOOBAR";
        break;
    case ($b % 5 == 0):
        echo $b." BAR";
        break;
    case ($b % 3 == 0):
        echo $b." FOO";
        break;
}
br();br();

$arr = [2, 3, 4, 5, 15, 48, 54, 72, 34, 33, 18, 90, 45, 2];

for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] % 3 == 0) {
        if ($arr[$i] % 5 == 0) {
            echo $arr[$i]." FOOBAR"."<br />";
        } else echo $arr[$i]." FOO"."<br />";
    } elseif ($arr[$i] % 5 == 0) echo $arr[$i]." BAR"."<br />";
}

/*
// I) вывод данных
// 1. вывести константу
// 2. вывести тремя способами значение любой переменной
// 3. создать переменную с вашим именем и вывести на экран фразу "привет имя"

const A = 9186243;
echo A;
br();

$a = 22123;

echo $a;
br();
print_r($a);
br();
var_dump($a);
br();
$name = "Владимир";

echo "Привет ".$name;
*/
