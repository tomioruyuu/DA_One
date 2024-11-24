<?php
class detailProduct
{
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM `products` WHERE id = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT id FROM `users` WHERE email = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$email], false);
    }

    public function insertComment($id, $id_users, $id_products, $content, $date)
    {
        $sql = "INSERT INTO `comments`(`id`, `id_users`, `id_products`, `content`, `ngaybinhluan`) VALUES (?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id, $id_users, $id_products, $content, $date]);
    }

    public function getComment($id_products)
    {
        $sql = "SELECT comments.content, comments.ngaybinhluan, u.username, u.avatar FROM `comments` INNER JOIN users AS u ON comments.id_users = u.id WHERE id_products = ? ORDER BY comments.ngaybinhluan DESC;";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_products]);
    }

    public function getSimilarProduct($id_category, $id_products)
    {
        $sql = "SELECT * FROM `products` WHERE `id_category` = ? AND `id` != ? ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_category, $id_products]);
    }
}
