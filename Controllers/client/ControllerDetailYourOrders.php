<?php
class ControllerDetailYourOrders
{
    public function renderYourDetailOrders()
    {
        $mDetailYourOrders = new DetailYourOrders();
        if (isset($_GET["id"])) {
            $id_order = $_GET["id"];
        }

        if (isset($_SESSION["id"])) {
            $id_user = $_SESSION["id"];
        }

        $listProducts = $mDetailYourOrders->getProductInYourOrder($id_order, $id_user);
        $infoReceiver = $mDetailYourOrders->getInfoReceiver($id_user, $id_order);

        

        require_once("./Views/client/detail-your-orders.php");
    }
}
