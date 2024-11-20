<?php 
// đây là trang sản phẩm
    class Products {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        // lấy toàn bộ danh sách sản phẩm
        public function getAllDataProducts() {
            $sql = "SELECT * FROM products";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

        public function getDataCate() {
            $sql = "SELECT * FROM `category`";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

        public function getProductById($id) {
            $sql = "SELECT * FROM `products` WHERE id = ?";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id], false);
        }

        public function handleAddProduct($id, $name, $price, $img, $quantity, $description, $id_category) {
            $sql = "INSERT INTO `products`(`id`, `name`, `price`, `img`, `quantity`, `desciption`, `id_category`) VALUES (?,?,?,?,?,?,?)";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id, $name, $price, $img, $quantity, $description, $id_category]);
        }


        public function handleUpdateProduct( $name, $price, $img, $quantity, $description, $id_category, $id) {
            $sql = "UPDATE `products` SET `name`=?,`price`=?,`img`=?,`quantity`=?,`desciption`=?,`id_category`=? WHERE id = ?";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([ $name, $price, $img, $quantity, $description, $id_category, $id]);
        }

        public function handleDeleteProduct($id) {
            $sql = "DELETE FROM `products` WHERE id = ?";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id]);
        }

    }
?>