<?php 
    class ControllerLogin {
        public function handleLogin() {
            $mLogin = new Login();
            $errors = [];
            if(isset($_POST["login-btn"])) {
                $email = $_POST["email"];
                $pass = $_POST["pass"];
                if(!trim($pass)) {
                    $errors["pass"]["minimum"] = "Mật khẩu tối thiểu là 6 kí tự";
                }
                if(empty($errors)) {
                    $listEmail = $mLogin->getEmails();
                    foreach ($listEmail as $item) {
                        if($item->email == $email && $item->password == $pass) {
                            if($email == "admin@gmail.com") {
                                $_SESSION["username"] = "admin";
                                $_SESSION["email"] = $email;
                                direct("?act=/");
                            }
                            else {
                                $_SESSION["username"] = "guest";
                                $_SESSION["email"] = $email;
                                direct("?act=''");
                            }
                        }
                        else {
                            setFlashData("smg", "Tài khoản hoặc mật khẩu không chính xác");
                            setFlashData("smg_type", "danger");
                        }
                    }
                }
            }
            $smg = getFlashData("smg");
            $smg_type = getFlashData(("smg_type"));

            require_once("./Views/client/login.php");
        }
    }
?>