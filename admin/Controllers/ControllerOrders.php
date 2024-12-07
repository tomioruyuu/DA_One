<?php
class ControllerOrders
{
    public function listOrders()
    {
        $mOrders = new Orders();
        $listOrders = $mOrders->getAllOrders();

        require_once("./Views/Orders/listOrders.php");
    }

    public function editOrders()
    {
        $mOrder = new Orders();
        $errors = [];
        if (isset($_GET["id"])) {
            // lấy id của order
            $id = $_GET["id"];
            $orderInfo = $mOrder->getOrderToEdit($id);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Hàm kiểm tra định dạng ngày hợp lệ

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
            }

            if (empty($errors)) {
                $mOrder->updateOrders($orderInfo->id_users, $payment_method, $create_at, $total, $address, $id);
                // cập nhật lại trạng thái trong bảng order status
                $mOrder->updateOrderStatus($status, $id);
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
