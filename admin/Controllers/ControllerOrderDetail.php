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

        public function deleteOrdersDetail() {
            if(isset($_GET["id"])) {
                $id_order_detail = $_GET["id"];
                $mOrderDetail = new OrderDetail();
                $mOrderDetail->deleteOrderDetail($id_order_detail);
                header("location:?act=listOrderDetail&id=$id_order_detail");
            }
        }
    }
?>