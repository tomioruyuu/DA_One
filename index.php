<?php 
    session_start();
    ob_start();
    require_once("./Model/ConnectDatabase.php");
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
    require_once("./modules/function/function.php");
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
        switch ($act) {
            // handle category
            case "listCategory":
                $cCategory->listCategory();
                break;
            case "addCategory":
                $cCategory->addCategory();
                break;
            // handle product
            case 'addProduct':
               $cProducts->addProducts();
                break;
            case 'editProducts':
                # code...
                break;
            case 'deleteProducts':
                # code...
                break;
            case 'listProduct':
                $cProducts->listProducts();
                break;
            default:
                require_once("./Views/admin/dashboard.php");
                break;
        }
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