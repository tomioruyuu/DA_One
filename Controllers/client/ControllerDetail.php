<?php
class ControllerDetail
{
    public function renderDetail()
    {
        $mDetail = new DetailProduct();
        try {
            if (isset($_GET["id"])) {
                $id_products = $_GET["id"];
                $product = $mDetail->getProductById($id_products);
            }

            // lấy dữ liệu về sản phẩm tương tự
            $id_category = $product->id_category;
            $listSimilarProduct = $mDetail->getSimilarProduct($id_category, $id_products);
            

            // lấy ra các bình luận của sản phẩm
            $comments = $mDetail->getComment($id_products);

            if (isset($_POST["send_comment"])) {
                if (isset($_SESSION["username"])) {
                    $content = $_POST["content"];
                    $email = isset($_SESSION["email"]) ? $_SESSION["email"]: "";
                    $user = $mDetail->getUserByEmail($email);
                    if ($content) {
                        $id_users = $user->id;
                        $date = date("Y-m-d H:i:s");
                        $mDetail->insertComment(null, $id_users, $id_products , $content, $date);
                        direct("?act=productDetail&id=$id_products");
                    }
                } else {
                    setFlashData("smg", "Vui lòng đăng nhập để thực hiện chức năng này");
                    setFlashData("smg_type", "danger");
                }
            }
        } catch (\Throwable $e) {
        }

        $smg = getFlashData("smg");
        $smg_type = getFlashData("smg_type");
        require_once("./Views/client/detailProduct.php");
    }
}
