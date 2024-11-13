<?php 
// đây là trang bình luận
    class Comments {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }
       
        public function getAllComments(){
            $sql="SELECT * FROM `comments` ";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }
    
        public function getCommentsById($id){
            $sql="SELECT * FROM `comments` where id = ? ";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id],false);
        }
    
        public function updateComments($id,$content){
            $sql="UPDATE `comments` SET `content`='?' WHERE id`='?'";
            $this->connect->setQuery($sql);
            $check = $this->connect->loadData([$id,$content]);
            if($check){
                return true;
            }
        }
    
        public function deleteComments($id){
            $sql="DELETE FROM `comments` id=$id";
            $this->connect->setQuery($sql);
            return $this->connect->execute([$id]);
        }
    }
?>