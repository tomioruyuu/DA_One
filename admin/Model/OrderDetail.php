<?php
class OrderDetail
{
    public $connect;

    public function __construct() {
        $this->connect = new ConnectDatabase();
    }

    public function getOrderDetails($id_orders) {
        $sql = "SELECT orders_detail.*, p.img, p.name FROM `orders_detail` INNER JOIN products as p on orders_detail.id_product = p.id WHERE id_orders =?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_orders]);
    }

    public function deleteOrderDetail($id_order_detail) {
        $sql = "DELETE FROM orders_detail WHERE id =?";
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id_order_detail]);
    }
}
