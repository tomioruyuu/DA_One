<?php
class ControllerYourOrders
{
    public function renderYourOrders()
    {
        if (isset($_SESSION["id"])) {
            $id_user = $_SESSION["id"];
            $mYours = new YourOrders();
            $listOrders = $mYours->getProductOrders($id_user);
            
        }
        

        require_once("./Views/client/your-orders.php");
    }
}
