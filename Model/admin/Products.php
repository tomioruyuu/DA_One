<?php 
// đây là trang sản phẩm
    class Products {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        // lấy toàn bộ danh sách sản phẩm
        public function getAllDataProducts() {
            $sql = "SELECT * FROM products";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }
    }
?>