<?php require_once("./layout/header-admin.php") ?>
<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>
    <div class="col-10 body-content">
        <div class="list-product">
            <div class="list_product-heading df-center  align-items-center">
                <div class="title-line"></div>
                <h1 class="title-list-product">Sửa đơn hàng</h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
                <div class="block">
                    <div class="form-group">
                        <label for="">Mã đơn hàng</label>
                        <input type="text" value="<?php echo $orderInfo->id ?>" disabled class="form-control">

                    </div>


                    <div class="form-group">
                        <label for="">Trạng thái đơn hàng</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option value="">Thay đổi trạng thái</option>
                            <option value="Chờ xác nhận" <?php if ($orderInfo->status == 'Chờ xác nhận') echo 'selected'; ?>>Chờ xác nhận</option>
                            <option value="Đã xác nhận" <?php if ($orderInfo->status == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                            <option value="Đang chuẩn bị hàng" <?php if ($orderInfo->status == 'Đang chuẩn bị hàng') echo 'selected'; ?>>Đang chuẩn bị hàng</option>
                            <option value="Đang trong quá trình vận chuyển" <?php if ($orderInfo->status == 'Đang trong quá trình vận chuyển') echo 'selected'; ?>>Đang trong quá trình vận chuyển</option>
                            <option value="Đang giao" <?php if ($orderInfo->status == 'Đang giao') echo 'selected'; ?>>Đang giao</option>
                            <option value="Giao hàng thành công" <?php if ($orderInfo->status == 'Giao hàng thành công') echo 'selected'; ?>>Giao hàng thành công</option>
                            <option value="Đã nhận" <?php if ($orderInfo->status == 'Đã nhận') echo 'selected'; ?>>Đã nhận</option>
                            <option value="Đã hủy" <?php if ($orderInfo->status == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
                        </select>
                        <p class="text-danger">
                            <?php
                            show_err_message($errors, "address")
                            ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="">Hình thức thanh toán</label>
                        <select class="form-select" name="payment_method" aria-label="Default select example">
                            <option value="">Chọn hình thức thanh toán</option>
                            <option value="Thanh toán khi nhận hàng" <?php if ($orderInfo->methods_payment == 'Thanh toán khi nhận hàng') echo 'selected'; ?>>Thanh toán khi nhận hàng</option>
                            <option value="Chuyển khoản" <?php if ($orderInfo->methods_payment == 'Chuyển khoản') echo 'selected'; ?>>Chuyển khoản</option>
                        </select>
                        <p class="text-danger">
                            <?php
                            show_err_message($errors, "address")
                            ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $orderInfo->address ?>">
                        <p class="text-danger">
                            <?php
                            show_err_message($errors, "address")
                            ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="">Tổng tiền</label>
                        <input type="text" class="form-control" name="total" value="<?php echo $orderInfo->total ?>">
                        <p class="text-danger">
                            <?php
                            show_err_message($errors, "total")
                            ?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="">Ngày đặt</label>
                        <input type="date" class="form-control" name="create-ad" value="<?php echo $orderInfo->create_at ?>">
                        <p class="text-danger">
                            <?php
                            show_err_message($errors, "create-ad")
                            ?>
                        </p>
                    </div>
                </div>
                <div class="cta-form mt20">
                    <a href="?act=listOrders" class="btn btn-form">Danh sách sản phẩm</a>
                    <button class="btn btn-form" name="btn-add" value="them">Sửa sản phẩm</button>
                </div>
            </form>

        </div>
    </div>
</div>