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

            // thực hiện chức năng bình luận
            if (isset($_POST["send_comment"])) {
                if (isset($_SESSION["username"])) {
                    $content = $_POST["content"];
                    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                    $user = $mDetail->getUserByEmail($email);
                    if ($content) {
                        $id_users = $user->id;
                        $date = date("Y-m-d H:i:s");
                        $mDetail->insertComment(null, $id_users, $id_products, $content, $date);
                        direct("?act=productDetail&id=$id_products");
                    }
                } else {
                    setFlashData("smg", "Vui lòng đăng nhập để thực hiện chức năng này");
                    setFlashData("smg_type", "danger");
                }
            }

            // thực hiện chức năng thêm sản phẩm vào giỏ hàng
            if (isset($_POST["btn_add-cart"])) {
                if (isset($_SESSION["username"])) {
                    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                    $user = $mDetail->getUserByEmail($email);
                    $id_users = $user->id;
                    $quantity = $_POST["quantity"];
                    $price = $product->price;
                    $size = $_POST["size"];
                    $id_products = isset($_GET["id"]) ? $_GET["id"] : "";
                    $errors = [];
                    if (!trim($size)) {
                        $errors["size"]["required"] = "Vui lòng chọn kích thước ";
                    }

                    if (empty($errors)) {
                        $mDetail->insertCart(null, $id_products, $id_users, $quantity, $price, $size);
                        echo "<script> alert('Thêm vào giỏ hàng thành công')</script>";
                        echo "<script>window.location.href='?act=productDetail&id=$id_products';</script>";
                    } else {
                        setFlashData("errors", $errors);
                    }
                } else {
                    setFlashData("smg-cart", "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng");
                    setFlashData("smg-cart_type", "danger");
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $errors = getFlashData("errors");
        $smg_cart = getFlashData("smg-cart");
        $smg_cart_type = getFlashData("smg-cart_type");
        $smg = getFlashData("smg");
        $smg_type = getFlashData("smg_type");
        require_once("./Views/client/detailProduct.php");
    }
}
