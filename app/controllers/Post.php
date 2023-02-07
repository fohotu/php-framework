<?php 
namespace app\controllers;

class Post extends App {
    
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