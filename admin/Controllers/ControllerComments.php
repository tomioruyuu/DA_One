<?php
class ControllerComments
{
    public function listComments()
    {
        $mComments = new Comments();
        $listComments = $mComments->getAllComments();
        require_once("./Views/Comments/listComments.php");
    }

    public function deleteComments()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $mComments = new Comments();
            $mComments->deleteComments($id);
            header("location: ?act=listComments");
        }
    }

    public function commentsDetail()
    {
        if (isset($_GET["id"])) {
            $id_product = $_GET["id"];
            $mComments = new Comments();
            $listComments = $mComments->getCommentById($id_product);
            require_once("./Views/Comments/detailComments.php");
        }
    }
}
