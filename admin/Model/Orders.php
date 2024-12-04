<?php
class Orders
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function insertOrders($id, $id_users, $status, $methods_payment, $create_at, $total, $address)
    {
        $sql = "INSERT INTO `orders`(`id`, `id_users`, `status`, `methods_payment`, `create_at`, `total`, `address`) VALUES (?,?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        $check = $this->connect->loadData([$id, $id_users, $status, $methods_payment, $create_at, $total, $address]);
        if ($check) {
            return true;
        }
    }

    public function getAllOrders()
    {
        $sql = "SELECT orders.*, u.username, u.fullname FROM `orders` INNER JOIN users as u on u.id = orders.id_users";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getOrdersById($id)
    {
        $sql = "SELECT * FROM `orders` where id = ? ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function getOrderToEdit($id)
    {
        $sql = "SELECT orders.*, u.fullname FROM `orders` INNER JOIN users AS u ON orders.id_users = u.id where orders.id = ? ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function updateOrders($id_users, $status, $payment_method, $create_at, $total,  $address, $id)
    {
        $sql = "UPDATE `orders` SET `id_users`=?,`status`=?,`methods_payment`=?,`create_at`=?,`total`=?,`address`=? WHERE `id`=?";
        $this->connect->setQuery($sql);
        return  $this->connect->loadData([$id_users, $status, $payment_method, $create_at, $total,  $address, $id]);
    }

    public function deleteOrders($id)
    {
        $sql = "DELETE FROM `orders` id=$id";
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id]);
    }
}
