<?php 
// đây là trang sản phẩm
    class Category {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        // lấy toàn bộ danh sách sản phẩm
        public function getAllDataCategory() {
            $sql = "SELECT * FROM category";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }
    }
?>