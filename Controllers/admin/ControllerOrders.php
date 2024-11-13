<?php 
    class ControllerOrders {
        public function updateOrders(){
            
        }

        public function deleteOrders(){
            $id = $_GET["id"];
            $mOrders = new Orders();
            $mOrders->deleteOrders($id);
            require_once("location: index.php");
        }
    }
?>