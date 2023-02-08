<?php 
namespace app\controllers;

use app\models\Main;

class MainController extends AppController{

    public function indexAction()
    {

        $r=\vendor\core\App::$app->getList();
        
        //$this->layout = 'main';
        $this->view = 'test';
        $model = new Main;
        $res = $model->findAll();
      //  \vendor\core\App::$app->cache->set('posts',$res);
        
        $post = $model->findOne(1);
      //  var_dump($r);exit;
        $this->set(['posts'=>$res,'title'=>'Hello Title']);
        
    }


    public function testAction()
    {
        if($this->isAjax){

        }
    }

    

}