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

class Registry {

    public static $objects = [];

    protected static $instance;


    protected function __construct()
    {
        global $config;
        foreach($config['components'] as $name => $component){
            self::$objects[$name] = new $component;
        }
    }


    public static function instance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __get($name)
    {
        if(is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }

    public function __set($name,$object)
    {
        if(!isset(self::$objects[$name])){
            self::$objects[$name] = new $object;
        }  
    }

    public function getList()
    {
       return self::$objects;
    }


}

?>