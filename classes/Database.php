<?php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "sales_oop";
    protected $conn;

    # creat the connection
    public function __construct()
    {
          $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

          if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
          } else {
            return $this->conn;
          }
    }
    }

?>