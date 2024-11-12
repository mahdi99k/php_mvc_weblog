<?php

class Database
{
    private string $localhost = DB_HOST;
    private string $db_name = DB_DATABASE;
    private string $username = DB_USERNAME;
    private string $password = DB_PASSWORD;
    private int $port = DB_PORT;
    //pdo orm php
    private $dbh;    //database handler OR $conn به این اسم معروف
    private $stmt;    //statement -> دستورات
    private $error;  //error database

    public function __construct()
    {
        try {
            //$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];//1-error  2-data obj ->
            $this->dbh = new PDO("mysql:host=$this->localhost;dbname=$this->db_name;port=$this->port;charset=utf8", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);  //data obj ->
            //echo "Database Connection Successfully";

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //---------- Method Customize
    public function prepare($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bindParam($param, $value)
    {
        $this->stmt->bindParam($param, $value);  //select * from users where id=:id -> درون (ام وی سی) از این مدل استافده میکنیم و نمیتونیم از علامت سوال استفاده کنیم
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll();  //return object
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function count($object): int
    {
        return count($object);
    }
}
