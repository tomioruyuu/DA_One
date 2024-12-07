<?php
class ControllerYourOrders
{
    public function renderYourOrders()
    {
        $mYours = new YourOrders();
        if (isset($_SESSION["id"])) {
            $id_user = $_SESSION["id"];
            $mYours = new YourOrders();
            $listOrders = $mYours->getProductOrders($id_user);
        }
        if (isset($_POST["handleDelete"])) {
            $id_status = isset($_POST["id_status"]) ? $_POST["id_status"] : null;
            $id_order = isset($_POST["id_order"]) ? $_POST["id_order"] : null;
            $mYours->changeStatusOrder($id_order, $id_status);
            $listOrders = $mYours->getProductOrders($id_user);
        }
        require_once("./Views/client/your-orders.php");
    }
}
