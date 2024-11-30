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
        }


        require_once("./Views/client/info.php");
    }
}
