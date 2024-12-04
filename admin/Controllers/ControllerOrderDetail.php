<?php 
    class ControllerOrderDetail {
        public function renderOrderDetail() {
            
            if(isset($_GET["id"])) {
                $id_orders = $_GET["id"];
                $mOrderDetail = new OrderDetail();
                $listOrders = $mOrderDetail->getOrderDetails($id_orders);
            }


            require_once("./Views/Order_detail/list.php");
        }
    }
?>