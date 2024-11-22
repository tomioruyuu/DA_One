<?php 
    class ControllerOrders {
        public function listOrders() {
            $mOrders = new Orders();
            $listOrders = $mOrders->getAllOrders();
            require_once("./Views/admin/Orders/listOrders.php");
        }

        public function addOrders() {
            $mOrders = new Orders();
            $listIdOrders = $mOrders->getAllOrders();
            $errors =[];
            if(isset($_POST["btn-add"])) {
               
                try {
                    $status = $_POST["status"];
                    $methods_payment = $_POST["methods_payment"];
                    $another_address = $_POST["another_address"];
                    $create_at = $_POST["create_at"];
                    if(!$status) {
                        $errors["status"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$methods_payment) {
                        $errors["methods_payment"]["required"] = "Vui lòng nhập trường này";
                    }
                    if(!$create_at) {
                        $errors["create_at"]["required"] = "Vui lòng nhập trường này";
                    }
                    
                    if(empty($errors)) {
                        $mOrders = new Orders();
                        $check = $mOrders->insertOrders(null,$status, $methods_payment, $another_address, $create_at);
                        if($check) {
                            header("location: ?act=addOrders");
                            exit;
                        }   
                    }

                } catch (Exception $e) {
                    echo $e->getMessage(). "<br>";
                    echo $e->getLine(). "<br>";
                    echo $e->getFile(). "<br>";
                }
            }
            require_once("./Views/admin/Orders/addOrders.php");

        }

       

        public function deleteOrders() {
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $mOrders = new Orders();
                $mOrders->deleteOrders($id);
                header("location: ?act=listOrders");
            }

        }
    }
?>