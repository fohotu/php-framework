<?php 
namespace vendor\core;

class Db{

    use TSingletone;

    protected $pdo;
    public static $countSql =0 ;
    public static $queries = [];

    protected function  __construct()
    {
        $db = require ROOT . '/config/db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC 
        ];
        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['password']);
    }

   

    public function execute($sql){
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql,$params =[]){
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if($res !== false){
            return $stmt->fetchAll();
        }
        return [];
    }

}