<?php 
    class ControllerSearch{
        public function HandleSearch() {
            $mSearch = new Search();
            $listCate = $mSearch->getCategory();
            if(isset($_POST["search-btn"])) {
                try {
                    $key = isset($_POST["keySearch"]) ? $_POST["keySearch"] : "";
                    $id_category = isset($_POST["category"]) ? $_POST["category"] : "";
                    $price = isset($_POST["price"]) ? $_POST["price"] : "";
                
                    if(!empty($key)) {
                        $listProduct = $mSearch->getProductInSearch($key, $id_category, $price);
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
            require_once("./Views/client/search.php");
        }
    }
?>