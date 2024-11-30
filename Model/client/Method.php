<?php
class Method
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getProductInCart($id_user)
    {
        $sql = "SELECT p.id, p.name, p.img, cart.price * cart.quantity AS price, cart.quantity, cart.size FROM `cart` INNER JOIN products as p ON p.id = cart.id_products WHERE id_user = ?";
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

    public function insertOrder($id, $id_users, $status, $methods_payment, $create_at, $total)
    {
        $sql = "INSERT INTO `orders`(`id`, `id_users`, `status`, `methods_payment`, `create_at`, `total`) VALUES (?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        $this->connect->loadData([$id, $id_users, $status, $methods_payment, $create_at, $total]);
        return $this->connect->pdo->lastInsertId();
    }

    public function insertOrderDetail($id, $id_orders, $id_product, $unitPrice, $quantity)
    {
        $sql = "INSERT INTO `orders_detail`(`id`, `id_orders`, `id_product`, `unitPrice`, `quantity`) VALUES (?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id, $id_orders, $id_product, $unitPrice, $quantity]);
    }

    public function clearCart($id_user) {
        $sql = "DELETE FROM `cart` WHERE id_user = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user]);
    }

    public function getQuantityCart($id_user) {
        $sql = "SELECT COUNT(id) AS quantity FROM `cart` WHERE id_user= ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user], false);
    }
}
