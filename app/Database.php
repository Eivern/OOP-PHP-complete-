<?php

class Database
{
    private $host       = 'localhost';
    private $username   = 'root';
    private $password   = '';
    private $db_name    = 'belajar_php';
    protected $con;

    public function __construct()
    {
        return $this->con = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->db_name
        );
    }
}
