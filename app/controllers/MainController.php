<?php 
namespace app\controllers;

use app\models\Main;
use vendor\core\base\View;

class MainController extends AppController{

    public function indexAction()
    {

        $r=\vendor\core\App::$app->getList();
      //  var_dump($_SERVER);exit;
        //$this->layout = 'main';
        $this->view = 'test';
        $model = new Main;
        $res = $model->findAll();
        View::setMeta('TITLE','Description', 'key words');
      //  \vendor\core\App::$app->cache->set('posts',$res);
        
        $post = $model->findOne(1);
      //  var_dump($r);exit;
        $this->set(['posts'=>$res,'title'=>'Hello Title']);
        
    }


    public function testAction()
    {
        if($this->isAjax){
            $model = new Main();
            $post = \R::findOne('posts',"id = 1");
            $this->loadView('test',compact('post'));
            die;
        }
    }

    

}