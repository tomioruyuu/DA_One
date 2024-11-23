<?php 
    class ControllerProducts {
        public function listProducts() {
                $mProducts = new Products();
                $listProducts = $mProducts->getAllDataProducts();
                require_once("./Views/Products/listProduct.php");
        }

        public function addProducts() {
            $mProducts = new Products();
            $listIdCate = $mProducts->getDataCate();
            $errors =[];
            if(isset($_POST["btn-add"])) {
               
                try {
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $quantity = $_POST["quantity"];
                    $path = "./modules/images/";
                    $img = $path . $_FILES["img"]["name"];
                    $description = $_POST["description"];
                    $id_category = $_POST["id_category"];
                    if(!$name) {
                        $errors["name"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$price) {
                        $errors["price"]["required"] = "Vui lòng nhập trường này";
                    }
                    else{
                        if($price <= 0) {
                            $errors["price"]["minimum"] = "Giá tiền phải lớn hơn 0";
                        }
                    }
                    if($_FILES["img"]["error"] !== 0) {
                        $errors["img"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$quantity) {
                        $errors["quantity"]["required"] = "Vui lòng nhập trường này";
                    }
                    else{
                        if($quantity <= 0) {
                            $errors["quantity"]["minimum"] = "Số lượng sản phẩm phải lớn hơn 0";
                        }
                    }
                    
                    if(!$description) {
                        $errors["description"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$id_category) {
                        $errors["id_category"]["required"] = "Vui lòng nhập trường này";
                    }

                    if(empty($errors)) { 
                        move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                        $check = $mProducts->handleAddProduct(null, $name, $price, $img, $quantity, $description, $id_category);
                        direct("?act=listProduct");
                    }

                } catch (Exception $e) {
                    echo $e->getMessage(). "<br>";
                    echo $e->getLine(). "<br>";
                    echo $e->getFile(). "<br>";
                }
            }
            $smg = getFlashData("smg");
            $smg_type = getFlashData(("smg_type"));
            
            require_once("./Views/Products/addProduct.php");

        }

        public function updateProduct() {
            try {
                $id = $_GET["id"];
                $mProducts = new Products();
                $dataProduct = $mProducts->getProductById($id);
                $listIdCate = $mProducts->getDataCate();
                $errors = [];
                if((isset($_POST["btn-edit"]))) {
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $quantity = $_POST["quantity"];
                    $path = "./modules/images/";
                    if(!empty($_FILES['img']['name'] && $_FILES['img']['error'] == UPLOAD_ERR_OK)) {
                        $img = $path . $_FILES["img"]["name"];
                    }
                    else {
                        $img = $dataProduct->img;
                    }
                    $description = $_POST["description"];
                    $id_category = $_POST["id_category"];

                    if(!$name) {
                        $errors["name"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$price) {
                        $errors["price"]["required"] = "Vui lòng nhập trường này";
                    }
                    else{
                        if($price <= 0) {
                            $errors["price"]["minimum"] = "Giá tiền phải lớn hơn 0";
                        }
                    }
                    if(!$quantity) {
                        $errors["quantity"]["required"] = "Vui lòng nhập trường này";
                    }
                    else{
                        if($quantity <= 0) {
                            $errors["quantity"]["minimum"] = "Số lượng sản phẩm phải lớn hơn 0";
                        }
                    }
                    
                    if(!$description) {
                        $errors["description"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$id_category) {
                        $errors["id_category"]["required"] = "Vui lòng nhập trường này";
                    }

                    if(empty($errors)) {
                        
                        move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                        $check = $mProducts->handleUpdateProduct($name, $price, $img, $quantity, $description, $id_category, $id);
                        direct("?act=listProduct");
                    }
                }


                require_once("./Views/Products/editProduct.php");
            } catch (Exception $e) {
                echo $e->getMessage(). "<br>";
                echo $e->getLine(). "<br>";
                echo $e->getFile(). "<br>";
            }
        }

        public function deleteProduct() {
           if(isset($_GET["id"])) {
            $id = $_GET["id"];
            $mProducts = new Products();
            $mProducts->handleDeleteProduct($id);
            header("location: ?act=listProduct");
            exit();
           }
        }
    }
?>