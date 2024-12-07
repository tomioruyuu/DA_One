<?php
class DetailYourOrders
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getProductInYourOrder($id_order, $id_user)
    {
        $sql = "SELECT orders_detail.unitPrice, orders_detail.quantity, p.name, p.img, o.methods_payment, o.total, o.address, o.create_at FROM `orders_detail`INNER JOIN orders AS o ON o.id=orders_detail.id_orders INNER JOIN products AS p ON orders_detail.id_product = p.id WHERE orders_detail.id_orders = ? AND o.id_users = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_order, $id_user]);
    }

    public function getInfoReceiver($id_user, $id_order) {
        $sql = "SELECT users.fullname, o.address, users.phone, users.email, o.methods_payment, o.total, ot.status FROM `users` INNER JOIN orders AS o ON o.id_users = users.id INNER JOIN order_status AS ot ON ot.id = o.id_status WHERE users.id = ? AND o.id = ? ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user, $id_order], false);
    }
}
