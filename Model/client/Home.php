<?php
class Home
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getCateImg()
    {
        $sql = "SELECT category.id, category.name, MIN(p.img) AS img FROM category INNER JOIN products AS p ON category.id = p.id_category GROUP BY category.name, category.id LIMIT 4;";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getProduct()
    {
        $sql = "SELECT id, name, price, img FROM `products` ORDER BY id DESC";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getProductLuxury()
    {
        $sql = "SELECT id, name, price, img FROM `products` ORDER BY id ASC LIMIT 9";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM `category`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
}
