<?php 
    class detailProduct {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
?>