<?php 
// đây là trang sản phẩm
    class Products {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
?>