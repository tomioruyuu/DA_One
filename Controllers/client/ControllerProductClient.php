<?php 
    class ControllerProductClient {
        public function renderProduct() {
            $mProductClient = new ProductClient();
            $listProduct = $mProductClient->getProduct();
            $listCate = $mProductClient->getCate();
            require_once("./Views/client/product-client.php");
        }
    }
?>