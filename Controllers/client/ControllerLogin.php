<?php
class ControllerLogin
{
    public function handleLogin()
    {
        $mLogin = new Login();
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login-btn"])) {

            $email = $_POST["email"];
            $pass = $_POST["pass"];
            if (strlen(trim($pass)) < 6) {
                $errors["pass"]["minimum"] = "Mật khẩu tối thiểu là 6 kí tự";
            }

            if (empty($errors)) {
                $listEmail = $mLogin->getEmails();
                $authenticated = false;
                foreach ($listEmail as $item) {
                    if ($item->email == $email && password_verify($pass, $item->password)) {
                        $authenticated = true;
                        $_SESSION["name_user"] = $item->username;
                        if ($item->role == "admin") {
                            $_SESSION["quantityCart"] = $mLogin->getQuantityCart($item->id)->quantity;
                            $_SESSION["id"] = $item->id;
                            $_SESSION["username"] = "admin";
                            $_SESSION["email"] = $email;
                            direct("http://localhost/DA_One/admin");
                        } else {
                            $_SESSION["quantityCart"] = $mLogin->getQuantityCart($item->id)->quantity;
                            $_SESSION["id"] = $item->id;
                            $_SESSION["username"] = "guest";
                            $_SESSION["email"] = $email;
                            direct("http://localhost/DA_One/");
                        }
                        break; // Ngừng kiểm tra khi đã khớp
                    }
                }

                if (!$authenticated) {
                    setFlashData("smg", "Tài khoản hoặc mật khẩu không chính xác");
                    setFlashData("smg_type", "danger");
                }
            } else {
                setFlashData("smg", "Có lỗi");
                setFlashData("smg_type", "danger");
            }
        }
        $smg = getFlashData("smg");
        $smg_type = getFlashData("smg_type");


        require_once("./Views/client/login.php");
    }
}
