<?php
session_start();
ob_start();

// phần model
require_once("./Model/ConnectDatabase.php");
require_once("./Model/admin/Dashboard.php");
require_once("./Model/admin/Products.php");
require_once("./Model/admin/Accounts.php");
require_once("./Model/admin/Comments.php");
require_once("./Model/admin/Statistics.php");
require_once("./Model/admin/Category.php");
require_once("./Model/admin/Orders.php");
require_once("./Model/client/Home.php");
require_once("./Model/client/Footer.php");
require_once("./Model/client/Login.php");
require_once("./Model/client/Register.php");
require_once("./Model/client/DetailProduct.php");
require_once("./Model/client/Cart.php");

// phần controller
require_once("./Controllers/admin/ControllerProducts.php");
require_once("./Controllers/admin/ControllerAccounts.php");
require_once("./Controllers/admin/ControllerComments.php");
require_once("./Controllers/admin/ControllerStatistics.php");
require_once("./Controllers/admin/ControllerCategory.php");
require_once("./Controllers/admin/ControllerOrders.php");
require_once("./Controllers/admin/ControllerLogout.php");
require_once("./Controllers/admin/ControllerDashboard.php");
require_once("./Controllers/client/ControllerHome.php");
require_once("./Controllers/client/ControllerFooter.php");
require_once("./Controllers/client/ControllerLogin.php");
require_once("./Controllers/client/ControllerRegister.php");
require_once("./Controllers/client/ControllerDetail.php");
require_once("./Controllers/client/ControllerCart.php");
require_once("./modules/function/function.php");

// tạo đối tượng controller trong phần admin
$cDashboard = new ControllerDashboard();
$cProducts = new ControllerProducts();
$cAccounts = new ControllerAccounts();
$cComments = new ControllerComments();
$cStatistics = new ControllerStatistics();
$cCategory = new ControllerCategory();
$cOrders = new ControllerOrders();
$cLogoutAmin = new ControllerLogoutAdmin();
// tạo đối tượng controller trong phần clients
$cHome = new ControllerHome();
$cFooter = new ControllerFooter();
$cLogin = new ControllerLogin();
$cRegister = new ControllerRegister();
$cDetail = new ControllerDetail();
$cCart = new ControllerCart();

// điều hướng giao diện
$act = $_GET["act"] ?? "/";
if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
    require_once("./modules/templates/header-admin.php");
?>
    <div class="d-flex align-content-center">
        <?php
        require_once("./modules/templates/right-section.php");
        switch ($act) {
                // hanđle logout
            case "logout":
                $cLogoutAmin->handleLogout();
                // handle category
            case "listCategory":
                $cCategory->listCategory();
                break;
            case "addCategory":
                $cCategory->addCategory();
                break;
            case "editCategory":
                $cCategory->editCategory();
                break;
            case "deleteCategory":
                $cCategory->deleteCategory();
                break;

                // handle product
            case 'addProduct':
                $cProducts->addProducts();
                break;
            case 'editProduct':
                $cProducts->updateProduct();
                break;
            case 'deleteProduct':
                $cProducts->deleteProduct();
                break;
            case 'listProduct':
                $cProducts->listProducts();
                break;

                // handle accounts
            case "listAccounts":
                $cAccounts->listAccounts();
                break;
            case "addAccounts":
                $cAccounts->addAccounts();
                break;
            case "editAccounts":
                $cAccounts->editAccounts();
                break;
            case "deleteAccounts":
                $cAccounts->deleteAccounts();
                break;
                // handle accounts
            case "listComments":
                $cComments->listComments();
                break;
            case "deleteComments":
                $cComments->deleteComments();
                break;
                // handle orders
            case "listOrders":
                $cOrders->listOrders();
                break;
            case "deleteOrders":
                $cOrders->deleteOrders();
                break;

            default:
                $cDashboard->renderDashboard();
                break;
        }
        ?>
    </div>
<?php
}
// else if(isset($_SESSION["username"]) && $_SESSION["username"] == "guest") {
//     require_once("./modules/templates/header-guest.php");

// }
else {
    require_once("./modules/templates/header-guest.php");
?>
    <div class="d-flex align-content-center">
        <?php
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
    </div>
<?php

}
?>


<?php
ob_end_flush();
$cFooter->renderFooter();

// require_once("./modules/templates/footer.php")
?>