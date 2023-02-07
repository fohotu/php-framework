<?php 
namespace vendor\core\base;

class View {

    public $view;

    public $route = [];

    public $layout;


    public function __construct($route,$layout = '',$view = '')
    {
        $this->route = $route;
       
       if($layout === false){
        $this->layout = false;
       }else{
            $this->layout = $layout ? : LAYOUT;
       }
        $this->view = $view;
    }

    public function render($vars)
    {
        if(is_array($vars)) 
            extract($vars);

        $file_view = APP ."/views/{$this->route['controller']}/{$this->view}.php";  
        ob_start();
        if(file_exists($file_view)){
            require $file_view;
        }else{
            echo "File Not Found $file_view";
        }
        $content = ob_get_clean();

        if($this->layout !== false){
            $file_layout = APP ."/views/layouts/{$this->layout}.php";
            if(is_file($file_layout)){
                require $file_layout;
            }else{
                echo "File Not Found - $file_layout";
            }
        }   
       

       

    }
}


?>