<?php
class OrderDetail
{
    public $connect;

    public function __construct() {
        $this->connect = new ConnectDatabase();
    }

    public function getOrderDetails($id_orders) {
        $sql = "SELECT orders_detail.*, p.name FROM `orders_detail` INNER JOIN products as p on orders_detail.id_product = p.id WHERE id_orders =?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_orders]);
    }
}
