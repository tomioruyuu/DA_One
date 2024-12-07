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
        $sql = "SELECT p.id, p.name, p.img, cart.price, cart.quantity, cart.size FROM `cart` INNER JOIN products as p ON p.id = cart.id_products WHERE id_user = ?";
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

    public function insertOrder($id, $id_users, $id_status, $methods_payment, $create_at, $total, $address)
    {
        $sql = "INSERT INTO `orders`(`id`, `id_users`, `id_status`, `methods_payment`, `create_at`, `total`, `address`) VALUES (?,?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        $this->connect->loadData([$id, $id_users, $id_status, $methods_payment, $create_at, $total, $address]);
        return $this->connect->pdo->lastInsertId();
    }

    public function insertOrderDetail($id, $id_orders, $id_product, $unitPrice, $quantity)
    {
        $sql = "INSERT INTO `orders_detail`(`id`, `id_orders`, `id_product`, `unitPrice`, `quantity`) VALUES (?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id, $id_orders, $id_product, $unitPrice, $quantity]);
    }

    public function clearCart($id_user)
    {
        $sql = "DELETE FROM `cart` WHERE id_user = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user]);
    }

    public function getQuantityCart($id_user)
    {
        $sql = "SELECT COUNT(id) AS quantity FROM `cart` WHERE id_user= ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user], false);
    }

    public function insertOrderStatus($update_at)
    {
        $sql = "INSERT INTO `order_status`( `updated_at`) VALUES (?)";
        $this->connect->setQuery($sql);
        $this->connect->loadData([$update_at]);
        return $this->connect->pdo->lastInsertId();
    }

    public function updateOrderStatus($id_order, $id_status) {
        $sql = "UPDATE `order_status` SET `id_order`= ? WHERE `id`=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_order, $id_status]);
    }
}
