<?php

namespace App;
use PDO;

class Connect extends Credentials{
    protected $conn;
    function __construct(private string $dsn = 'mysql', private string $port = '3306')
    {
        try{
            $this->conn = new \PDO($this->dsn.":host=".$this->__get('host').";dbname=".$this->__get('dbname')."; user=".$this->username."; password=".$this->__get('password')."; port=".$this->port);
            print_r('success');
        } catch (\PDOException $e){
            print_r($e->getMessage());
        }
    }
}


?>









