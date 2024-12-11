<?php
class YourOrders
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getProductOrders($id_user)
    {
        $sql = "
                SELECT o.id, o.create_at, o.total, ot.status, ot.id as id_status,
                GROUP_CONCAT(
                    CONCAT(
                        '{\"name\":\"', p.name,
                        '\", \"unitPrice\":', orders_detail.unitPrice,
                        ', \"img\":\"', p.img,
                        '\", \"quantity\":', orders_detail.quantity,
                        '}'
                    )
                ) AS product
                FROM orders_detail
                INNER JOIN orders AS o ON o.id = orders_detail.id_orders
                INNER JOIN products AS p ON p.id = orders_detail.id_product
                INNER JOIN order_status AS ot ON o.id_status = ot.id
                WHERE o.id_users = ? AND ot.status != 'Đã hủy'
                GROUP BY o.id
                ORDER BY o.id desc
                ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user]);
    }

    public function changeStatusOrder($id_order, $id_status)
    {
        $sql = "UPDATE `order_status` SET `status`='Đã hủy' WHERE `id_order` = ? AND `id` = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_order, $id_status]);
    }

    public function handleReceiveStatus($id_order, $id_status)
    {
        $sql = "UPDATE `order_status` SET `status`='Đã nhận' WHERE `id_order` = ? AND `id` = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_order, $id_status]);
    }
}
