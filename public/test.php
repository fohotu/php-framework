<?php 

require dirname("..")."/vendor/lib/rb/rb-mysql.php";
$db = require dirname("..")."/config/db.php";

R::setup($db['dsn'],$db['user'],$db['password']);

$post= R::load('blog_post',2);
 


var_dump($post['title']);



?>