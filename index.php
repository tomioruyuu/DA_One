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
require_once("./Model/client/Search.php");
require_once("./Model/client/ProductClient.php");
require_once("./Model/client/Info.php");
require_once("./Model/client/Method.php");
require_once("./Model/client/Finish.php");
require_once("./Model/client/YourOrders.php");


// phần controller client
require_once("./modules/function/function.php");
require_once("./Controllers/client/ControllerHome.php");
require_once("./Controllers/client/ControllerFooter.php");
require_once("./Controllers/client/ControllerLogin.php");
require_once("./Controllers/client/ControllerRegister.php");
require_once("./Controllers/client/ControllerDetail.php");
require_once("./Controllers/client/ControllerCart.php");
require_once("./Controllers/client/ControllerHeader.php");
require_once("./Controllers/client/ControllerLogout.php");
require_once("./Controllers/client/ControllerSearch.php");
require_once("./Controllers/client/ControllerProductClient.php");
require_once("./Controllers/client/ControllerInfo.php");
require_once("./Controllers/client/ControllerMethod.php");
require_once("./Controllers/client/ControllerFinish.php");
require_once("./Controllers/client/ControllerYourOrders.php");

// index phần người dùng

// tạo đối tượng controller trong phần clients
$cHome = new ControllerHome();
$cFooter = new ControllerFooter();
$cLogin = new ControllerLogin();
$cRegister = new ControllerRegister();
$cDetail = new ControllerDetail();
$cCart = new ControllerCart();
$cHeader = new ControllerHeader();
$cSearch = new ControllerSearch();
$cLogoutClient = new ControllerLogoutClient();
$cProductClient = new ControllerProductClient();
$cInfo = new ControllerInfo();
$cMethod = new ControllerMethod();
$cFinish = new ControllerFinish();
$cYourOrders = new ControllerYourOrders();

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
        $cDetail->renderDetail();
        break;
    case "cart":
        $cCart->renderCart();
        break;
    case "deleteCart":
        $cCart->deleteFromCart();
        break;
    case "logout":
        $cLogoutClient->handleLogout();
    case "search":
        $cSearch->HandleSearch();
        break;
    case "product":
        $cProductClient->renderProduct();
        break;
    case "info":
        $cInfo->renderInfo();
        break;
    case "method_payment":
        $cMethod->renderMethod();
        break;
    case "finish":
        $cFinish->renderFinish();
        break;
    case "yourOrders":
        $cYourOrders->renderYourOrders();
        break;
    default:
        $cHome->renderHomePage();
}

?>


<?php
ob_end_flush();
$cFooter->renderFooter();

?>