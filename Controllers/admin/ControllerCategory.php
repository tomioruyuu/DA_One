<?php 
    class ControllerCategory {
        public function listCategory() {
            $mCategory = new Category();
            $listCategory = $mCategory->getAllDataCategory();
            require_once("./Views/admin/Category/listCategory.php");
        }

        public function addCategory() {
            $errors = [];
            if(isset($_POST["btn-submit"])) {
                try {
                    $name_cate = $_POST["name_cate"];
                    if(!$name_cate) {
                        $errors["name_cate"]["required"] = "Vui lòng nhập trường này";
                    }

                    if(empty($errors)) {
                        $mCategory = new Category();
                        $check = $mCategory->insertCategory(null, $name_cate);
                        if($check) {
                            header("location: ?act=addCategory");
                            exit;
                        }   
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage() ."<br>";
                    echo $e->getLine() ."<br>";
                    echo $e->getFile() ."<br>";
                }
                
            }
            require_once("./Views/admin/Category/addCategory.php");
        }

        public function editCategory() {      
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $mCategory = new Category();
                $itemCate = $mCategory->getDataCategoryById($id);
            }
            $errors = [];
            if(isset($_POST["btn-submit"])) {
                try {
                    $name_cate = $_POST["name_cate"];
                    if(!$name_cate) {
                        $errors["name_cate"]["required"] = "Vui lòng nhập trường này";
                    }

                    if(empty($errors)) {
                        $mCategory = new Category();
                        $check = $mCategory->updateCategory($id, $name_cate);
                        if($check) {
                            header("location: ?act=listCategory");
                            exit;
                        }   
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage() ."<br>";
                    echo $e->getLine() ."<br>";
                    echo $e->getFile() ."<br>";
                }
            }   
            require_once("./Views/admin/Category/editCategory.php");
        }

        public function deleteCategory() {
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $mCategory = new Category();
                $mCategory->delete($id);
                header("location: ?act=listCategory");
            }

        }
    }
?>