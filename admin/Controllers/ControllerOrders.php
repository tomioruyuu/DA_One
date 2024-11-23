<?php 
    class ControllerOrders {
        public function listOrders() {
            $mOrders = new Orders();
            $listOrders = $mOrders->getAllOrders();
            require_once("./Views/Orders.php/listOrders.php");
        }

        public function updateOrders(){
            
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