<?php 
// đây là trang thống kê
    class Statistics {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
        public function getTotalProducts() {
            $sql = "SELECT COUNT(id) AS total FROM products";
            $this->setQuery($sql);
            return $this->connect->loadData();
        }
    
        public function getTotalQuantity() {
            $sql = "SELECT SUM(quantity) AS total_quantity FROM products";
            $this->setQuery($sql);
            return $this->connect->loadData();
        }
    
        public function getAveragePrice() {
            $sql = "SELECT AVG(price) AS avg_price FROM products";
            $this->setQuery($sql);
            return $this->connect->loadData();
        }
    
        public function getProductsByCategory() {
            $sql = "SELECT id_category, COUNT(*) AS count FROM products GROUP BY id_category";
            $this->setQuery($sql);
            return $this->connect->loadData();
        }
    
    
    $Statistics = new ProductStatistics();
    
    $totalProducts = $Statistics->getTotalProducts();
    $totalQuantity = $Statistics->getTotalQuantity();
    $averagePrice = $Statistics->getAveragePrice();
    $productsByCategory = $Statistics->getProductsByCategory();
    }
    
?>