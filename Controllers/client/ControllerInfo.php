<?php
class ControllerInfo
{
    public function renderInfo()
    {
        $mInfo = new Info();
        
        if (isset($_SESSION["id"])) {
            $id_user = $_SESSION["id"];
            $listProduct = $mInfo->getProductInCart($id_user);
            $userInfo = $mInfo->getUser($id_user);
            $totalPrice = $mInfo->getTotal($id_user);
            if(isset($_POST["btn-info"])) {
                $address = $_POST["address"];
                $_SESSION["address"] = $address;
                direct("?act=method_payment");
            }
        }


        require_once("./Views/client/info.php");
    }
}
