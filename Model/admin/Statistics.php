<?php 
// đây là trang thống kê
    class Statistics {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
    
?>