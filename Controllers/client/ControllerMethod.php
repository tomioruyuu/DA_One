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
                $allPrice = $totalPrice->total + 30;
                
                // tạo thời gian khi cập nhật trạng thái
                $date = date('Y-m-d H:i:s');
                $id_status = $mMethod->insertOrderStatus($date);

                $id_order = $mMethod->insertOrder(null, $id_user, $id_status, $method_payment, $create_at, $allPrice, $address);
                foreach ($listProduct as $item) {
                    $mMethod->insertOrderDetail(null, $id_order, $item->id, $item->price, $item->quantity);
                }
                $mMethod->updateOrderStatus($id_order, $id_status);
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
