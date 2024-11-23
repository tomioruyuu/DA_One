<?php 
    class Header {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
?>