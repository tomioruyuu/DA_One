<?php 
    class Dashboard {
        public $connect;

        public function __construct()
        {
           $this->connect = new ConnectDatabase();
        }

        public function getQuantityCategory() {
            $sql = "SELECT COUNT(*) as quantity FROM `category`";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([], false);
        }

        public function getQuantityProduct() {
            $sql = "SELECT COUNT(*) as quantity FROM `products`";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([], false);
        }

        public function getQuantityAccount() {
            $sql = "SELECT COUNT(*) as quantity FROM `users`";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([], false);
        }

        public function getQuantityComment() {
            $sql = "SELECT COUNT(*) as quantity FROM `comments`";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([], false);
        }

        public function getQuantityOrder() {
            $sql = "SELECT COUNT(*) as quantity FROM `orders`";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([], false);
        }

        // public function getquantityDiscount() {
        //     $sql = "SELECT COUNT(*) as quantity FROM `discounts`";
        //     $this->connect->setQuery($sql);
        //     return $this->connect->loadData([], false);
        // }

        
    }

?>