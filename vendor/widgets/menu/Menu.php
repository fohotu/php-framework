<?php 
namespace vendor\widgets\menu;
use vendor\lib\rb\Rb;
class Menu{
    public $data;
    public $tree;
    public $menuHtml;
    public $tpl;
    public $container;
    public $table;
    public $cache;


    public function __construct()
    {
        $this->run();
    }

    protected function run()
    {
        $this->data = \RedBeanPHP::getAssoc("SELECT * FROM categories");
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
    }

    protected function getTree()
    {
        $tree = [];
        foreach($this->data as $id=>$node){
            if(!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }

        return $tree;

    }

    protected function getMenuHtml($tree,$tab = '')
    {
        $str = '';
        foreach($tree as $id => $category){
            $str .= $this->catToTemplate($category,$tab,$id);
        }
    }

    protected function catToTemplate($category,$tab,$id)
    {
        ob_start();
        require __DIR__.'/menu_tpl/menu.php';
        return ob_get_clean();
    }

}

?>