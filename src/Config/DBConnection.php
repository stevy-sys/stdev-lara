<?php
namespace Stdev\Framework\Config ;
use PDO ; 

class DBConnection 
{

    public $dbname;
    public $host;
    public $username;
    public $password;
    public $pdo;

    public function __construct($dbname,$host,$username,$password) {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPdo() : PDO {
        return $this->pdo ?? $this->pdo  = new PDO("mysql:dbname={$this->dbname};host={$this->host}",$this->username,$this->password,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
        ]);
    }
}
