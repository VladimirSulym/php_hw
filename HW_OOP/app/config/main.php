<?php

$appPath = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..');

return [
    'app_path' => $appPath,
    'controller_path' => $appPath.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers',
    'views_path' => $appPath.DIRECTORY_SEPARATOR.'views',
    'db' => [
        'local'=>[
            'host' => '192.168.1.4',
            'port' => '3306',
            'login' => 'vormagic',
            'password'=> 'mySQL123vor_456',
            'name' => 'wd7sql'
        ]
    ]
];