<?php 
namespace vendor\core;

class Router{

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp,$route=[])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        foreach(self::$routes as $pattern => $route)
        {
            if(preg_match("#$pattern#i",$url,$matches))
            {   
                foreach($matches as $k => $v)
                {
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action'])){
                    $route['action'] = 'index';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        if(self::matchRoute($url))
        {
            $controller = 'app\controllers\\'.self::upperCamelCase(self::$route['controller']);
            if(class_exists($controller)){
                $obj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']).'Action';
                if(method_exists($obj,$action)){
                    $obj->$action();
                }else{
                    echo "Method $action Not Found";
                }
            }else{
                echo "Controller <i>$controller</i> not found";
            }
        }
        else
        {
            http_response_code(404);
            include '404.php';
        }
    }

    protected static function upperCamelCase($name)
    {
        return str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }

    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name)); 
    }
}

?>