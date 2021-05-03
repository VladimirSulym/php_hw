<?php

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