<?php
class ControllerMethod
{
    public function renderMethod()
    {
        $mMethod = new Method();
        if (isset($_SESSION["id"])) {
            $id_user = $_SESSION["id"];
            $listProduct = $mMethod->getProductInCart($id_user);
            $userInfo = $mMethod->getUser($id_user);
            $totalPrice = $mMethod->getTotal($id_user);
        }

        if (isset($_POST["btn-method"])) {
            try {
                $method_payment = $_POST["method"];
                $create_at = date('Y-m-d H:i:s');
                $address = isset($_SESSION["address"]) ? $_SESSION["address"] : "";
                $id_orders = $mMethod->insertOrder(null, $id_user, "Chờ xác nhận", $method_payment, $create_at, $totalPrice->total, $address);
                foreach ($listProduct as $item) {
                    $mMethod->insertOrderDetail(null, $id_orders, $item->id, $item->price, $item->quantity);
                }
                $date = date('Y-m-d H:i:s');
                $mMethod->insertOrderStatus($id_orders, "Chờ xác nhận", $date);
                deleteSession("address");
                $mMethod->clearCart($id_user);
                $_SESSION["quantityCart"] = $mMethod->getQuantityCart($id_user)->quantity;
                echo "<script>alert('Hoàn tất thanh toán')</script>";
                echo "<script>window.location.href='?act=finish';</script>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        require_once("./Views/client/method_payment.php");
    }
}
