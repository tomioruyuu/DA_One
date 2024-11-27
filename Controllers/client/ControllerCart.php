<?php
class ControllerCart
{

    public $id_user;

    public function __construct()
    {
        $this->initializeUserId();
    }

    // Hàm khởi tạo để lấy id_user
    public function initializeUserId()
    {
        if (isset($_SESSION["email"])) {
            $mCart = new Cart();
            $email = $_SESSION["email"];
            $user = $mCart->getUserByEmail($email);
            $this->id_user = $user ? $user->id : null;
        } else {
            $this->id_user = null;
        }
    }
    public function renderCart()
    {
        $mCart = new Cart();
        if ($this->id_user) {
            $listProduct = $mCart->getProductInCart($this->id_user);
            $totalItem = $mCart->getTotal($this->id_user);
            $totalPrice = $totalItem->total;
        } else {
            $listProduct = [];
        }

        $total = $mCart->getTotal($this->id_user);
        require_once("./Views/client/cart.php");
    }

    public function deleteFromCart()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $mCart = new Cart();
            $mCart->delete($id);
            direct("?act=cart");
        }
    }
}
