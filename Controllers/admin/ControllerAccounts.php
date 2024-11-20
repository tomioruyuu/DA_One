<?php 
    class ControllerAccounts {
        public function listAccounts() {
            $mAccounts = new Accounts();
            $listAccounts = $mAccounts->getAllAccounts();
            require_once("./Views/admin/Accounts/listAccounts.php");
        }

        public function addAccounts() {
            $errors = [];
            if(isset($_POST["btn-submit-addAccounts"])) {
                try {
                    $fullname = $_POST["fullname"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $errors = [];

                    if (!$fullname) {
                        $errors["fullname"] = "Vui lòng nhập họ tên";
                    }
                    if (!$username) {
                        $errors["username"] = "Vui lòng nhập tên đăng nhập";
                    }
                    if (!$password) {
                        $errors["password"] = "Vui lòng nhập mật khẩu";
                    }
                    if (!$email) {
                        $errors["email"] = "Vui lòng nhập email";
                    }
                    if (!$phone) {
                        $errors["phone"] = "Vui lòng nhập số điện thoại";
                    }
                    if (!$address) {
                        $errors["address"] = "Vui lòng nhập địa chỉ";
                    }

                    if(empty($errors)) {
                        $mAccounts = new Accounts();
                        $check = $mAccounts->insertAccounts(null,$fullname, $username, $password, $email, $phone, $address);
                        if($check) {
                            header("location: ?act=addAccounts");
                            exit;
                        }   
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage() ."<br>";
                    echo $e->getLine() ."<br>";
                    echo $e->getFile() ."<br>";
                }
                
            }
            require_once("./Views/admin/Accounts/addAccounts.php");
        }

        public function editAccounts() {      
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $mAccounts = new Accounts();
                $itemAccount = $mAccounts->getAccountsById($id);
            }
            $errors = [];
            if(isset($_POST["btn-submit-accounts"])) {
                try {
                    $id =$_GET["id"];
                    $fullname = $_POST["fullname"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $errors = [];

                    if (!$fullname) {
                        $errors["fullname"] = "Vui lòng nhập họ tên";
                    }
                    if (!$username) {
                        $errors["username"] = "Vui lòng nhập tên đăng nhập";
                    }
                    if (!$password) {
                        $errors["password"] = "Vui lòng nhập mật khẩu";
                    }
                    if (!$email) {
                        $errors["email"] = "Vui lòng nhập email";
                    }
                    if (!$phone) {
                        $errors["phone"] = "Vui lòng nhập số điện thoại";
                    }
                    if (!$address) {
                        $errors["address"] = "Vui lòng nhập địa chỉ";
                    }

                    if(empty($errors)) {
                        $mAccounts = new Accounts();
                        $check = $mAccounts->updateAccounts($fullname, $username, $password, $email, $phone, $address, $id);
                        header("location: ?act=listAccounts");
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage() ."<br>";
                    echo $e->getLine() ."<br>";
                    echo $e->getFile() ."<br>";
                }
            }   
            require_once("./Views/admin/Accounts/editAccounts.php");
        }

        public function deleteAccounts() {
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $mAccounts = new Accounts();
                $mAccounts->delete($id);
                header("location: ?act=listAccounts");
            }

        }
    }
?>