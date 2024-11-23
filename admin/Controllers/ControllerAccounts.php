<?php 
    class ControllerAccounts {
        public function listAccounts() {
            $mAccounts = new Accounts();
            $listAccounts = $mAccounts->getAllAccounts();
            require_once("./Views/Accounts/listAccounts.php");
        }

        public function addAccounts() {
            $errors = [];
            if(isset($_POST["btn-submit-addAccounts"])) {
                try {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $errors = [];

       
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
                        $check = $mAccounts->insertAccounts(null, $username, $password, $email, $phone, $address);
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
            require_once("./Views/Accounts/addAccounts.php");
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
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    $errors = [];

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
                        $check = $mAccounts->updateAccounts($username, $password, $email, $phone, $address, $id);
                        header("location: ?act=listAccounts");
                    }
                    
                } catch (PDOException $e) {
                    echo $e->getMessage() ."<br>";
                    echo $e->getLine() ."<br>";
                    echo $e->getFile() ."<br>";
                }
            }   
            require_once("./Views/Accounts/editAccounts.php");
        }

        public function deleteAccounts() {
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $mAccounts = new Accounts();
                $mAccounts->deleteAccounts($id);
                header("location: ?act=listAccounts");
            }

        }
    }
?>