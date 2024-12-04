<?php
class Orders {
    public $connect;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }

    public function insertOrders( $id,$status, $methods_payment, $another_address, $create_at){
        $sql="INSERT INTO `orders`(`id`,`status`, `methods_payment`, `another_address`, `create_at`) VALUES ('?','?','?','?','?')";
        $this->connect->setQuery($sql);
        $check = $this->connect->loadData([$id,$status, $methods_payment, $another_address, $create_at]);
        if($check){
            return true;
        }
    }

    public function getAllOrders(){
        $sql="SELECT orders.*, u.username, u.fullname FROM `orders` INNER JOIN users as u on u.id = orders.id_users";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getOrdersById($id){
        $sql="SELECT * FROM `orders` where id = ? ";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id],false);
    }

    public function updateOrders($id,$status,$methods_payment,$another_address,$create_at){
        $sql="UPDATE `orders` SET `status`='?',`methods_payment`='?',`another_address`='?',`create_at`='?' WHERE `id`='$id'";
        $this->connect->setQuery($sql);
        $check = $this->connect->loadData([$status,$methods_payment,$another_address,$create_at,$id]);
        if($check){
            return true;
        }
    }

    public function deleteOrders($id){
        $sql="DELETE FROM `orders` id=$id";
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id]);
    }
}