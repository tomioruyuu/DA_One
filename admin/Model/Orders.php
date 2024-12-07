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
        $sql = "SELECT orders.*, u.username, u.fullname, ot.status as status FROM `orders` INNER JOIN users as u on u.id = orders.id_users INNER JOIN order_status as ot ON ot.id = orders.id_status";
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
        $sql = "SELECT orders.*, u.fullname, ot.status as status FROM `orders` INNER JOIN users AS u ON orders.id_users = u.id INNER JOIN order_status AS ot ON orders.id_status = ot.id where orders.id = ? ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function updateOrders($id_users, $payment_method, $create_at, $total,  $address, $id)
    {
        $sql = "UPDATE `orders` SET `id_users`=?, `methods_payment`=?,`create_at`=?,`total`=?,`address`=? WHERE `id`=?";
        $this->connect->setQuery($sql);
        return  $this->connect->loadData([$id_users, $payment_method, $create_at, $total,  $address, $id]);
    }

    public function deleteOrders($id)
    {
        $sql = "DELETE FROM `orders` where id= ?";
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id]);
    }

    public function updateOrderStatus($status, $id_order)
    {
        $sql = "UPDATE `order_status` SET `status`=? WHERE `id_order`=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$status, $id_order]);
    }
}
