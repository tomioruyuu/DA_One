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
        $sql = "SELECT email,username, password FROM `users`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
}
