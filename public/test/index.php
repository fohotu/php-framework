<?php 
    $config = [
        'components' => [
            'cache' => 'vendor\lib\Cache',
            'test' => 'vendor\lib\Test',
        ],
    ];

    spl_autoload_register(function($class){
        $file = ROOT .'/' . str_replace('\\','/',$class) . '.php';
     
        if(file_exists($file)){
            require_once $file;
        }
    });


?>