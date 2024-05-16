<?php

require_once 'Database.php';

class User extends Database
{
    private $tb_name = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function regist(array $data)
    {
        $username   = $data['username'];
        $password   = $data['password'];

        $sql        = "INSERT INTO $this->tb_name (username, password)
                    VALUES ('$username', '$password')";

        $query      = mysqli_query($this->con, $sql);
        return $query;
    }

    public function login(array $data)
    {
        $username   = $data['username'];
        $password   = $data['password'];

        $sql        = "SELECT * FROM $this->tb_name WHERE
                        username = '$username' AND password = '$password' LIMIT 1";
        $query      = mysqli_query($this->con, $sql);

        if (!$query->num_rows) return false;

        session_start();
        $_SESSION['id']       = mysqli_fetch_assoc($query)['id'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        return true;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}

$User = new User();
