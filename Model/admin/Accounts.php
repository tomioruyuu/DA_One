<?php 
// đây là trang tài khoản
    class Accounts {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        public function insertAccounts($fullname, $username, $password, $email, $phone, $address){
            $sql="INSERT INTO `users`(`fullname`, `username`, `password`, `email`, `phone`, `address`) VALUES ('?','?','?','?','?','?')";
            $this->connect->setQuery($sql);
            $check = $this->connect->loadData([$fullname, $username, $password, $email, $phone, $address]);
            if($check){
                return true;
            }
        }
    
        public function getAllAccounts(){
            $sql="SELECT * FROM `users` ";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }
    
        public function getAccountsById($id){
            $sql="SELECT * FROM `users` where id = ? ";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id],false);
        }
    
        public function updateAccounts($id,$fullname, $username, $password, $email, $phone, $address){
            $sql="UPDATE `users` SET `fullname`='?',`username`='?',`password`='?',`email`='?',`phone`='?',`address`='?' WHERE `id`='$id'";
            $this->connect->setQuery($sql);
            $check = $this->connect->loadData([$fullname, $username, $password, $email, $phone, $address]);
            if($check){
                return true;
            }
        }
    
        public function deleteAccounts($id){
            $sql="DELETE FROM `users` id=$id";
            $this->connect->setQuery($sql);
            return $this->connect->execute([$id]);
        }
    }
?>