<?php 
    session_start();
    ob_start();
    require_once("./Model/ConnectDatabase.php");
    require_once("./Model/admin/Dashboard.php");
    require_once("./Model/admin/Products.php");
    require_once("./Model/admin/Accounts.php");
    require_once("./Model/admin/Comments.php");
    require_once("./Model/admin/Statistics.php");
    require_once("./Model/admin/Category.php");
    require_once("./Model/admin/Orders.php");
    require_once("./Controllers/admin/ControllerProducts.php");
    require_once("./Controllers/admin/ControllerAccounts.php");
    require_once("./Controllers/admin/ControllerComments.php");
    require_once("./Controllers/admin/ControllerStatistics.php");
    require_once("./Controllers/admin/ControllerCategory.php");
    require_once("./Controllers/admin/ControllerOrders.php");
    require_once("./Controllers/admin/ControllerDashboard.php");
    require_once("./modules/function/function.php");
    $cDashboard = new ControllerDashboard();
    $cProducts = new ControllerProducts();
    $cAccounts = new ControllerAccounts();
    $cComments = new ControllerComments();
    $cStatistics = new ControllerStatistics();
    $cCategory = new ControllerCategory();
    $cOrders = new ControllerOrders();
    $_SESSION["username"] = "admin";

    $act = $_GET["act"] ?? "/";
    if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
        require_once("./modules/templates/header-admin.php");
        ?>
        <div class="d-flex align-content-center">
        <?php
        require_once("./modules/templates/right-section.php");
        switch ($act) {
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
                # code...
                break;
            case 'deleteProduct':
                # code...
                break;
            case 'listProduct':
                $cProducts->listProducts();
                break;
            default:
                $cDashboard->renderDashboard();
                break;
        }
        ?>
        </div>
        <?php
    }
    else if(isset($_SESSION["username"]) && $_SESSION["username"] == "guest") {
        require_once("./modules/templates/header-guest.php");
    }
    else {
        require_once("./modules/templates/header-guest.php");
    }
?>


<?php 
    ob_end_flush();
    require_once("./modules/templates/footer.php")
?>