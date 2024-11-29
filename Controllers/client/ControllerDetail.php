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
                if (!$product) {
                    throw new Exception("Không tìm thấy sản phẩm");
                }
            } else {
                throw new Exception("ID sản phẩm không hợp lệ");
            }

            // Lấy sản phẩm tương tự
            $id_category = $product->id_category ?? null;
            $listSimilarProduct = $id_category ? $mDetail->getSimilarProduct($id_category, $id_products) : [];

            // Lấy bình luận sản phẩm
            $comments = $mDetail->getComment($id_products);

            // Thêm bình luận
            if (isset($_POST["send_comment"])) {
                if (isset($_SESSION["username"])) {
                    $content = $_POST["content"] ?? "";
                    if ($content) {
                        $email = $_SESSION["email"] ?? "";
                        $user = $mDetail->getUserByEmail($email);
                        $id_users = $user->id ?? null;
                        $date = date("Y-m-d H:i:s");
                        $mDetail->insertComment(null, $id_users, $id_products, $content, $date);
                        header("Location: ?act=productDetail&id=$id_products");
                        exit();
                    }
                } else {
                    setFlashData("smg", "Vui lòng đăng nhập để thực hiện chức năng này");
                    setFlashData("smg_type", "danger");
                }
            }

            // Thêm vào giỏ hàng
            if (isset($_POST["btn_add-cart"])) {
                if (!isset($_SESSION["username"])) {
                    setFlashData("smg-cart", "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng");
                    setFlashData("smg-cart_type", "danger");
                } else {
                    $email = $_SESSION["email"] ?? "";
                    $quantity = $_POST["quantity"] ?? 1;
                    $size = $_POST["size"] ?? "";
                    $errors = [];

                    if (!trim($size)) {
                        $errors["size"]["required"] = "Vui lòng chọn kích thước";
                    }

                    if (!empty($errors)) {
                        setFlashData("errors", $errors);
                    } else {
                        $check = $mDetail->checkExist($id_products);
                        if ($check) {
                            $mDetail->updateQuantity($id_products);
                        } else {
                            $user = $mDetail->getUserByEmail($email);
                            $id_users = $user->id ?? null;
                            $price = $product->price ?? 0;
                            $mDetail->insertCart(null, $id_products, $id_users, $quantity, $price, $size);
                        }
                        echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
                        echo "<script>window.location.href='?act=productDetail&id=$id_products';</script>";
                    }
                }
            }

            $errors = getFlashData("errors");
            $smg_cart = getFlashData("smg-cart");
            $smg_cart_type = getFlashData("smg-cart_type");
            $smg = getFlashData("smg");
            $smg_type = getFlashData("smg_type");

            require_once("./Views/client/detailProduct.php");
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
