<?php 
    session_start();
    require_once("./modules/templates/header.php");
    require_once("./Model/ConnectDatabase.php");
    require_once("./Model/admin/Products.php");
    require_once("./Model/admin/Accounts.php");
    require_once("./Model/admin/Comments.php");
    require_once("./Model/admin/Statistics.php");
    require_once("./Controllers/admin/ControllerProducts.php");
    require_once("./Controllers/admin/ControllerAccounts.php");
    require_once("./Controllers/admin/ControllerComments.php");
    require_once("./Controllers/admin/ControllerStatistics.php");
    $cProducts = new ControllerProducts();
    $cAccounts = new ControllerAccounts();
    $cComments = new ControllerComments();
    $cStatistics = new ControllerStatistics();
    $_SESSION["username"] = "admin";

    if($_SESSION["username"]) {
        $act = $_GET["act"] ?? "/";
        switch ($act) {
            case 'addProducts':
                # code...
                break;
            case 'editProducts':
                # code...
                break;
            case 'deleteProducts':
                # code...
                break;
            case 'listProducts':
                # code...
                break;
            default:
                require_once("./Views/admin/dashboard.php");
                break;
        }
    }
?>


<?php 
    require_once("./modules/templates/footer.php")
?>