<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500;1,600&display=swap" rel="stylesheet">

    <!-- link favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="./modules/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./modules/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./modules/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./modules/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./modules/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./modules/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./modules/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./modules/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./modules/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./modules/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./modules/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./modules/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./modules/favicon/favicon-16x16.png">
    <link rel="manifest" href="./modules/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- link css -->
    <link rel="stylesheet" href="modules/css/bootstrap.min.css">
    <link rel="stylesheet" href="modules/css/reset.css">
    <link rel="stylesheet" href="modules/css/style.css?ver=<?php echo rand() ?>">
    <title>Document</title>
</head>

<body>
    <header>
        
        <div class="header-content df-center ml-20">
            <div class="header-logo">
                <img class="img" src="modules\images\logog7-removebg-preview.png" alt="">
            </div>
            <div class="header-action header-user pr-50">
                <?php
                if (isset($_SESSION["name_user"]) && $_SESSION["name_user"]) {
                ?>
                    <p class="name_user"><?php echo $_SESSION["name_user"] ?></p>
                <?php
                }
                ?>
                <i class="fa-regular fa-circle-user user-guest "></i>
                <ul class="user-cta">

                    <?php
                    if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
                    ?>
                        <li>
                            <a href="http://localhost/DA_One/admin">Quản trị website</a>
                        </li>
                        <li>
                            <a href="http://localhost/DA_One/">Giao diện người dùng</a>
                        </li>
                        <li>
                            <a href="?act=logout">Đăng xuất</a>
                        </li>
                    <?php
                    } else if (isset($_SESSION["username"]) && $_SESSION["username"] == "guest") {
                    ?>
                        <li>
                            <a href="">Tài khoản</a>
                        </li>
                        <li>
                            <a href="?act=logout">Đăng xuất</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li>
                            <a href="?act=login">Đăng nhập</a>
                        </li>
                        <li>
                            <a href="?act=register">Đăng ký</a>
                        </li>
                        <li>
                            <a href="?act=logout">Đăng xuất</a>
                        </li>
                    <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </header>

</body>

</html>