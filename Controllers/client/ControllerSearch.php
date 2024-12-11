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
                    $sort = isset($_POST["sort"]) ? $_POST["sort"] : "";
                    if(!empty($key || $id_category || $price || $sort)) {
                        $listProduct = $mSearch->getProductInSearch($key, $id_category, $price, $sort);
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }

            if(isset($_GET["id_category"])) {
                $id_category = $_GET["id_category"];
                $listProduct = $mSearch->getProductInSearch("",$id_category, "", "");
            }
            require_once("./Views/client/search.php");
        }
    }
?>