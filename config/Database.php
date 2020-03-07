<?php

class Database
{
    private $host='localhost';
    private $username='root';
    private $dbname='myblog';
    private $password='';
    private $conn = null;

    public function connect()
    {
        try
        {
         $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';',$this->username,$this->password);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo 'connection error'.$e->getMessage();
        }
        return $this->conn;
    }


}