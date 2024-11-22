<?php
class Register
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getEmails()
    {
        $sql = "SELECT email, password FROM `users`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function insertUser($id, $username, $pass, $email, $phone, $address, $avatar)
    {
        $sql = "INSERT INTO `users`(`id`, `username`, `password`, `email`, `phone`, `address`, `avatar`) VALUES (?,?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id, $username, $pass, $email, $phone, $address, $avatar]);
    }
}
