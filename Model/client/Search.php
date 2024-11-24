<?php

use IMAP\Connection;

class Search
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM `category`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }


    public function getProductInSearch($key, $id_category, $price, $sort)
    {
        $sql = "SELECT * FROM products WHERE 1=1"; 

        if ($id_category) {
            $sql .= " AND id_category = $id_category";
        }

        if ($price) {
            $sql .= " AND $price";
        }

        if ($key) {
            $sql .= " AND name LIKE '%$key%'";
        }

        if($sort) {
            $sql .= " ORDER BY price $sort";
        }

    
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
}
