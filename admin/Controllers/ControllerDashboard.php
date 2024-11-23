<?php 
    class ControllerDashboard {
        public function renderDashboard() {
            $mDashboard = new Dashboard();
            $quantityCate = $mDashboard->getQuantityCategory();
            $quantityPro = $mDashboard->getQuantityProduct();
            $quantityAcc = $mDashboard->getQuantityAccount();
            $quantityOrder = $mDashboard->getQuantityOrder();
            $quantityCom = $mDashboard->getQuantityComment();
            require_once("./Views/dashboard.php");
        }
    }
?>