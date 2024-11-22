<?php 
    class Footer {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        public function getCategory() {
            $sql = "SELECT * FROM `category` LIMIT 5";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

    }
?>