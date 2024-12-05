<?php
class Cart
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getProductInCart($id_user)
    {
        $sql = "SELECT p.name, p.img, cart.id, cart.quantity, cart.price, cart.size FROM `cart` INNER JOIN products as p ON cart.id_products = p.id WHERE cart.id_user = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user]);
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT id FROM `users` WHERE email = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$email], false);
    }

    public function getTotal($id_user)
    {
        $sql = "SELECT SUM(price * quantity) AS total FROM cart WHERE id_user = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user], false);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `cart` WHERE id = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id]);
    }
}
