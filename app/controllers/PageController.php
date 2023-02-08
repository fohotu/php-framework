<?php 
namespace app\controllers;


class PageController extends AppController{
    
 

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