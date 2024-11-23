<?php
session_start();
ob_start();
// phần model admin
require_once("./Model/ConnectDatabase.php");
require_once("./Model/Dashboard.php");
require_once("./Model/Products.php");
require_once("./Model/Accounts.php");
require_once("./Model/Comments.php");
require_once("./Model/Statistics.php");
require_once("./Model/Category.php");
require_once("./Model/Orders.php");

// phần controller admin
require_once("./Controllers/ControllerProducts.php");
require_once("./Controllers/ControllerAccounts.php");
require_once("./Controllers/ControllerComments.php");
require_once("./Controllers/ControllerStatistics.php");
require_once("./Controllers/ControllerCategory.php");
require_once("./Controllers/ControllerOrders.php");
require_once("./Controllers/ControllerLogout.php");
require_once("./Controllers/ControllerDashboard.php");

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

$act = $_GET["act"] ?? "/";

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