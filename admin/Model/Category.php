<?php 
// đây là trang sản phẩm
    class Category {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        // lấy toàn bộ danh sách sản phẩm
        public function getAllDataCategory() {
            $sql = "SELECT * FROM category";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

        public function getDataCategoryById($id) {
            $sql = "SELECT * FROM category where id = ?";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id], false);
        }
        
        public function insertCategory($id, $name_cate) {
            $sql = "INSERT INTO `category`(`id`, `name`) VALUES (?,?)";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id, $name_cate]);
        }

        public function updateCategory($id, $name_cate) {
            $sql = "UPDATE `category` SET `name`= ? WHERE `id`= ?";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$name_cate, $id]);
        }

        public function delete($id) {
            $sql = "DELETE FROM `category` WHERE id = ?";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id]);
        }
        
    }
?>