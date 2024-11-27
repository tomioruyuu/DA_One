<?php
class ControllerRegister
{
    public function handleRegister()
    {
        $pattern = "/^(0[3|5|7|8|9])+([0-9]{8})$/";
        $mRegister = new Register();
        $listEmail = $mRegister->getEmails();
        $errors = [];
        if (isset($_POST["register-btn"])) {
            try {
                $fullname = $_POST["fullname"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $address = $_POST["address"];
                $pass = $_POST["pass"];
                $pass_confirm = $_POST["pass_confirm"];

                if (strlen(trim($fullname)) < 2) {
                    $errors["usefullnamername"]["minimum"] = "Tên đăng nhập tối thiểu 2 kí tự";
                }

                if (strlen(trim($username)) < 2) {
                    $errors["username"]["minimum"] = "Tên đăng nhập tối thiểu 2 kí tự";
                }

                foreach ($listEmail as $item) {
                    if ($item->email == $email) {
                        $errors["email"]["exist"] = "Email đã tồn tại";
                        break;
                    }
                }

                if (!preg_match($pattern, $phone)) {
                    $errors["phone"]["isValid"] = "Vui lòng nhập số điện thoại";
                }

                if (strlen(trim($pass)) < 6) {
                    $errors["pass"]["minimum"] = "Tên đăng nhập tối thiểu 6 kí tự";
                }

                if (trim($pass) != trim($pass_confirm)) {
                    $errors["pass_confirm"]["confirm"] = "Mật khẩu không trùng khớp";
                }

                if (empty($errors)) {
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    $mRegister->insertUser(null, $username, $pass, $email, $phone, $address, null);
                    direct("?act=login");
                } else {
                    setFlashData("old_value", $_POST);
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        $old_value = getFlashData("old_value");
        require_once("./Views/client/register.php");
    }
}
