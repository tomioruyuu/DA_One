<?php 
    class Discount {
        public $connect;
        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
?>