<?php 
// đây là trang tài khoản
    class Accounts {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
    }
?>