<?php 
    class ControllerCategory {
        public function listCategory() {
            $mCategory = new Products();
            $listCategory = $mCategory->getAllDataProducts();
            require_once("./Views/admin/Category/listCategory.php");
        }

        public function addCategory() {
            require_once("./Views/admin/Category/addCategory.php");
        }
    }
?>