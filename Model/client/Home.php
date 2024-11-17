<?php 
    class Home {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        public function getAllProducts() {
            
        }
    }
?>