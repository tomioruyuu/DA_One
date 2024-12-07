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
                SELECT o.id, o.create_at, o.total, ot.status,
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
                WHERE o.id_users = ?
                GROUP BY o.id;
                ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_user]);
    }
}
