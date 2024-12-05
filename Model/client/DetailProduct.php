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

    public function insertCart($id, $id_products, $id_users, $quantity, $price, $size)
    {
        $sql = "INSERT INTO `cart`(`id`, `id_products`, `id_user`,  `quantity`, `price`, `size`) VALUES (?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id, $id_products, $id_users, $quantity, $price, $size]);
    }
    public function getQuantityCart($id_users)
    {
        $sql = "SELECT COUNT(id) AS quantity FROM `cart` WHERE id_user=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_users], false);
    }
    public function checkExist($id_products, $size)
    {
        $sql = "SELECT `id` FROM `cart` WHERE id_products = ? and size = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_products, $size]);
    }

    public function updateQuantity($id_products, $size)
    {
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE id_products = ? and size = ?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id_products, $size]);
    }
}
