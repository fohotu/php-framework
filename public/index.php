<?php 
error_reporting(-1);
use vendor\core\Router;

require dirname("../")."/vendor/core/Router.php";
require dirname("../")."/vendor/lib/functions.php";

$query = rtrim($_SERVER['REQUEST_URI'],'/');


define('WWW',__DIR__);
define('CORE',dirname(__DIR__).'/vendor/code');
define('ROOT',dirname(__DIR__));
define('APP',dirname(__DIR__).'/app');
define('LAYOUT','default');
define('CACHE',dirname(__DIR__).'/tmp/cache');

require ROOT .'/vendor/lib/functions.php';



spl_autoload_register(function($class){
    $file = ROOT .'/' . str_replace('\\','/',$class) . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});

new \vendor\core\App;

Router::add('^pages/?(?P<action>[a-z-]+)?$',['controller'=>'Post']);
Router::add('^page/?(?P<action>[a-z-]+)?$',['controller'=>'Page','action'=>'view']);

Router::add('^$',['controller' => 'Main','action' => 'index']);
Router::add('(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?');


//var_dump(Router::getRoutes());

Router::dispatch($query);




?>