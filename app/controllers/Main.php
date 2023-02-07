<?php 
namespace app\controllers;
class Main extends App{

    public function indexAction()
    {
        $this->layout = 'main';
        $this->view = 'test';
        $this->set(['name'=>'Farkhod 1','title'=>'Hello Title']);
        
    }

}