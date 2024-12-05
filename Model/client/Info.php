<?php
class Info
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getProductInCart($id_user)
    {
        $sql = "SELECT p.name, p.img, cart.price, cart.quantity, cart.size FROM `cart` INNER JOIN products as p ON p.id = cart.id_products WHERE id_user = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user]);
    }

    public function getUser($id_user)
    {
        $sql = "SELECT * FROM `users` WHERE id = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user], false);
    }

    public function getTotal($id_user)
    {
        $sql = "SELECT SUM(price * quantity) AS total FROM cart WHERE id_user = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user], false);
    }

}
