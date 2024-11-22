<?php
class ControllerRegister
{
    public function handleRegister()
    {
        $mRegister = new Register();
        $listEmail = $mRegister->getEmails();
        $errors = [];
        if (isset($_POST["register-btn"])) {
            try {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $pass = $_POST["pass"];
                $pass_confirm = $_POST["pass_confirm"];

                if (strlen(trim($username)) < 2) {
                    $errors["username"]["minimum"] = "Tên đăng nhập tối thiểu 2 kí tự";
                }

                foreach ($listEmail as $item) {
                    if ($item->email == $email) {
                        $errors["email"]["exist"] = "Email đã tồn tại";
                        break;
                    }
                }

                if (strlen(trim($pass)) < 6) {
                    $errors["pass"]["minimum"] = "Tên đăng nhập tối thiểu 6 kí tự";
                }

                if (trim($pass) != trim($pass_confirm)) {
                    $errors["username"]["confirm"] = "Mật khẩu không trùng khớp";
                }

                if (empty($errors)) {
                    $mRegister->insertUser(null, $username, $pass, $email, null, null, null);
                    direct("?act=login");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        require_once("./Views/client/register.php");
    }
}
