<?php 
    class ControllerHome {
        public function renderHomePage() {
            $mHome = new Home();
            $listCateWithImg = $mHome->getCateImg();
            $listProduct = $mHome->getProduct();
            $listProductLuxury = $mHome->getProductLuxury();
            require_once("./Views/client/homepage.php");
        }
    }
?>