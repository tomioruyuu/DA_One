<?php 
// đây là trang bình luận
    class Comments {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
?>