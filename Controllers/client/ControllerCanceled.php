<?php 
    class ControllerCanceled {
        public function renderCanceled() {
            $mCanceled = new Canceled();
            if (isset($_SESSION["id"])) {
                $id_user = $_SESSION["id"];
                $listOrders = $mCanceled->getProductOrders($id_user);
            }
            require_once("./Views/client/canceled.php");
        }
    }
?>