<?php
session_start();
ob_start();
require_once("./Model/ConnectDatabase.php");

// phần model client
require_once("./Model/client/Home.php");
require_once("./Model/client/Footer.php");
require_once("./Model/client/Login.php");
require_once("./Model/client/Register.php");
require_once("./Model/client/DetailProduct.php");
require_once("./Model/client/Cart.php");


// phần controller client
require_once("./Controllers/client/ControllerHome.php");
require_once("./Controllers/client/ControllerFooter.php");
require_once("./Controllers/client/ControllerLogin.php");
require_once("./Controllers/client/ControllerRegister.php");
require_once("./Controllers/client/ControllerDetail.php");
require_once("./Controllers/client/ControllerCart.php");
require_once("./Controllers/client/ControllerHeader.php");
require_once("./modules/function/function.php");



// tạo đối tượng controller trong phần clients
$cHome = new ControllerHome();
$cFooter = new ControllerFooter();
$cLogin = new ControllerLogin();
$cRegister = new ControllerRegister();
$cDetail = new ControllerDetail();
$cCart = new ControllerCart();
$cHeader = new ControllerHeader();

// điều hướng giao diện
$act = $_GET["act"] ?? "/";

switch ($act) {
    case "login":
        $cLogin->handleLogin();
        break;
    case "register":
        $cRegister->handleRegister();
        break;
    case "productDetail":
        $cCart->renderCart();
        break;
    case "cart":
        $cDetail->renderDetail();
        break;

    default:
        $cHome->renderHomePage();
}

?>


<?php
ob_end_flush();
$cFooter->renderFooter();

?>