<?php require_once("./layout/header-admin.php") ?>

<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>

    <div class="col-10 body-content">
        <div class="list_product-heading df-center align-items-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Tổng quan</h1>
        </div>
        <div class="dashboard-content">
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/category.png" alt="" class="dashboard-item_img">
                <a href="?act=listCategory" class="dashboard-item_name">Danh mục</a>
                <p class="dashboard-item_quantity"><?php echo $quantityCate->quantity ?></p>
            </div>
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/product.png" alt="" class="dashboard-item_img">
                <a href="?act=listProduct" class="dashboard-item_name">Sản phẩm</a>
                <p class="dashboard-item_quantity"><?php echo $quantityPro->quantity ?></p>
            </div>
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/account.png" alt="" class="dashboard-item_img">
                <a href="?act=listAccounts" class="dashboard-item_name">Tài khoản</a>
                <p class="dashboard-item_quantity"><?php echo $quantityAcc->quantity ?></p>
            </div>
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/comments.png" alt="" class="dashboard-item_img">
                <a href="?act=listComments" class="dashboard-item_name">BÌnh luận</a>
                <p class="dashboard-item_quantity"><?php echo $quantityCom->quantity ?></p>
            </div>
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/orders.png" alt="" class="dashboard-item_img">
                <a href="?act=listOrders" class="dashboard-item_name">Đơn hàng</a>
                <p class="dashboard-item_quantity"><?php echo $quantityOrder->quantity ?></p>
            </div>
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/discount.png" alt="" class="dashboard-item_img">
                <a href="?act=listDiscount" class="dashboard-item_name">Chương trình khuyến mãi</a>
                <p class="dashboard-item_quantity">123</p>
            </div>
            <div class="dashboard-item d-flex flex-column align-items-center">
                <img src="./modules/images/statistic.png" alt="" class="dashboard-item_img">
                <a href="?act=statistic" class="dashboard-item_name">Thống kê</a>
                <p class="dashboard-item_quantity"></p>
            </div>
        </div>
    </div>

</div>

<?php require_once("./layout/footer.php") ?>