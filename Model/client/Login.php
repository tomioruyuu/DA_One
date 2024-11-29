<?php
class Login
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getEmails()
    {
        $sql = "SELECT id,email,username, password FROM `users`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getQuantityCart($id_user) {
        $sql = "SELECT COUNT(id) AS quantity FROM `cart` WHERE id_user= ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user], false);
    }
}
