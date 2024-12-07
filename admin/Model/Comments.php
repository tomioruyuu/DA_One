    <?php
    // đây là trang bình luận
    class Comments
    {
        public $connect;

        public function __construct()
        {
            $this->connect = new ConnectDatabase();
        }

        public function getAllComments()
        {
            $sql = "SELECT p.id, p.name, p.img, COUNT(comments.id) AS quantity FROM comments INNER JOIN  products AS p ON p.id = comments.id_products GROUP BY p.id, p.name, p.img";
            $this->connect->setQuery($sql);
            return $this->connect->loadData();
        }

        public function getCommentById($id)
        {
            $sql = "SELECT comments.id, u.username, comments.content, comments.ngaybinhluan FROM `comments` INNER JOIN users AS u ON u.id = comments.id_users WHERE comments.id_products = ? ORDER BY comments.ngaybinhluan ASC";
            $this->connect->setQuery($sql);
            return $this->connect->loadData([$id]);
        }

        public function updateComments($content, $id)
        {
            $sql = "UPDATE `comments` SET `content`='?' WHERE id`='?'";
            $this->connect->setQuery($sql);
            $check = $this->connect->loadData([$content, $id]);
            if ($check) {
                return true;
            }
        }

        public function deleteComments($id)
        {
            $sql = "DELETE FROM `comments` WHERE  id = ?";
            $this->connect->setQuery($sql);
            return $this->connect->execute([$id]);
        }
    }
    ?>