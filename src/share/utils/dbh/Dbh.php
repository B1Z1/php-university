<?php

class Dbh {
    private $host = "database";
    private $port = "3306";
    private $user = "root";
    private $password = "root";
    private $dbName = "shop";

    protected function connect() {
        $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName";
        $pdo = new PDO($dsn, $this->user, $this->password);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}
