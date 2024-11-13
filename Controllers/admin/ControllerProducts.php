<?php 
    class ControllerProducts {
        public function listProducts() {
                $mProducts = new Products();
                $listProducts = $mProducts->getAllDataProducts();
                require_once("./Views/admin/Products/listProduct.php");
        }

        public function addProducts() {
            require_once("./Views/admin/Products/addProduct.php");

        }
    }
?>