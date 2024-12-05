<?php
class ControllerOrders
{
    public function listOrders()
    {
        $mOrders = new Orders();
        $listOrders = $mOrders->getAllOrders();
        if (isset($_SESSION["smg"])) {
            $smg = $_SESSION["smg"];
            $smg_type = $_SESSION["smg_type"];
        }
        require_once("./Views/Orders/listOrders.php");
    }

    public function editOrders()
    {
        $mOrder = new Orders();
        $errors = [];
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $orderInfo = $mOrder->getOrderToEdit($id);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Hàm kiểm tra định dạng ngày hợp lệ
            function validateDate($date)
            {
                $format = 'Y-m-d H:i:s'; // Định dạng ngày mong muốn
                $d = DateTime::createFromFormat($format, $date);
                return $d && $d->format($format) === $date;
            }

            $status = trim($_POST['status']);
            $payment_method = trim($_POST['payment_method']);
            $address = trim($_POST['address']);
            $total = trim($_POST['total']);
            $create_at = trim($_POST['create-ad']);


            if (empty($status)) {
                $errors['status']['required'] = "Vui lòng chọn trạng thái đơn hàng.";
            }

            if (empty($payment_method)) {
                $errors['payment_method']['required'] = "Vui lòng chọn hình thức thanh toán.";
            }

            if (empty($address)) {
                $errors['address']['required'] = "Địa chỉ không được để trống.";
            }


            if (empty($create_at)) {
                $errors['create-ad']['required'] = "Ngày đặt không được để trống.";
            } elseif (!validateDate($create_at)) {
                $errors['create-ad']['isValid'] = "Ngày đặt không hợp lệ.";
            }

            if (empty($errors)) {
                $mOrder->updateOrders($orderInfo->id_users, $status, $payment_method, $create_at, $total, $address, $id);
                $mOrder->updateOrderStatus($status, $id);
                setFlashData("smg", "Cập nhật thành công");
                setFlashData("smg_type", "success");
                direct("?act=listOrders");
                exit;
            } else {
            }
        }


        require_once("./Views/Orders/editOrders.php");
    }



    public function deleteOrders()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $mOrders = new Orders();
            $mOrders->deleteOrders($id);
            header("location: ?act=listOrders");
        }
    }
}
