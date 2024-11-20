<?php 
    class Home {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        public function getCateImg() {
            $sql = "SELECT category.name, MIN(p.img) AS img FROM category INNER JOIN products AS p ON category.id = p.id_category GROUP BY category.name LIMIT 4;";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

        public function getProduct() {
            $sql = "SELECT name, price, img FROM `products` ORDER BY id DESC";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }
    }
?>