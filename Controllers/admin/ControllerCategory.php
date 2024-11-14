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
    }
?>