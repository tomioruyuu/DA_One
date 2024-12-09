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
                            <?php
                            $statuses = [
                                "Chờ xác nhận",
                                "Đã xác nhận",
                                "Đang chuẩn bị hàng",
                                "Đang trong quá trình vận chuyển",
                                "Đang giao",
                                "Giao hàng thành công",
                                "Đã nhận",
                                "Đã hủy"
                            ];

                            // Lấy vị trí trạng thái hiện tại
                            $currentIndex = array_search($orderInfo->status, $statuses);

                            foreach ($statuses as $index => $status) {
                            ?>
                                <option value="<?= $status ?>"
                                    <?php
                                    // Đánh dấu trạng thái hiện tại là selected
                                    if ($orderInfo->status == $status) {
                                        echo 'selected';
                                    }

                                    // Điều kiện chuyển trạng thái
                                    if ($status == 'Đã hủy') {
                                        // "Đã hủy" chỉ có thể được chọn nếu trạng thái hiện tại là "Chờ xác nhận"
                                        if ($orderInfo->status != 'Chờ xác nhận') {
                                            echo 'disabled';
                                        }
                                    } elseif ($index !== $currentIndex + 1 && $orderInfo->status != $status) {
                                        // Các trạng thái khác chỉ có thể chuyển sang bước tiếp theo
                                        echo 'disabled';
                                    }
                                    ?>>
                                    <?= $status ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <p class="text-danger">
                            <?php show_err_message($errors, "address"); ?>
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