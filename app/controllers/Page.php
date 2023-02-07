<?php 
namespace app\controllers;

use vendor\core\base\Controller;

class Page extends Controller{
    
 

    public function indexAction()
    {
        echo 'index';
    }

    public function viewAction()
    {
        echo 'view';
    }

    public function before()
    {
        echo 'before';
    }

}