<?php 
    class ProductClient {
        public $connect;
        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        public function getProduct() {
            $sql = "SELECT * FROM `products` WHERE 1";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

        public function getCate() {
            $sql = "SELECT * FROM `category` WHERE 1";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }
    }
?>