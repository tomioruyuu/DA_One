<?php require_once("./modules/templates/header-guest.php") ?>

<div class="main-content main-your_detail mt-30">
    <div class="yours-detail_content">
        <section class="info-receiver">
            <h2>Thông tin người nhận</h2>
            <div class="receiver-row mt-10">
                <div class="column left-column ">
                    <div>Tên khách hàng</div>
                    <div>Địa chỉ</div>
                    <div>Số điện thoại</div>
                    <div>Email người nhận</div>
                    <div>Phương thức thanh toán</div>
                    <div>Trạng thái</div>
                </div>
                <div class="column right-column ">
                    <div><?php echo $infoReceiver->fullname ?></div>
                    <div><?php echo $infoReceiver->address ?></div>
                    <div>0<?php echo $infoReceiver->phone ?></div>
                    <div><?php echo $infoReceiver->email ?></div>
                    <div><?php echo $infoReceiver->methods_payment ?></div>
                    <div><?php echo $infoReceiver->status ?></div>
                </div>
            </div>
        </section>

        <section class="info-products">
            <h2>Thông tin đơn hàng</h2>
            <table class="table table-hovered table-stripped mt-10">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listProducts as $index => $product) {
                    ?>
                        <tr class="">
                            <td><?php echo $index + 1; ?></td>
                            <td>
                                <p class="name"><?php echo $product->name; ?></p>
                            </td>
                            <td>
                                <img src="<?php echo $product->img; ?>" alt="" width="80">
                            </td>
                            <td><?php echo $product->quantity; ?></td>
                            <td>₫<?php echo number_format($product->unitPrice, 3, '.', ','); ?></td>
                        </tr>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="info-fee">
            <h2>Thông tin phí và tổng tiền</h2>
            <div class="fee-row mt-10">
                <div class="column left-column ">
                    <div>Tổng tiền hàng:</div>
                    <div>Phí vận chuyển:</div>
                    <div>Thành tiền:</div>
                </div>
                <div class="column right-column ">
                    <?php
                    $allPriceProduct = 0;
                    foreach ($listProducts as $item) {
                        $allPriceProduct += $item->unitPrice;
                    }
                    ?>
                    <div>₫<?php echo number_format($allPriceProduct, 3, '.', ',') ?></div>
                    <div>₫<?php echo $infoReceiver->total > 1000 ? "Miễn phí" : "30.000" ?></div>
                    <div class="text-danger">₫<?php echo $infoReceiver->total > 1000 ? $allPriceProduct : $infoReceiver->total  ?></div>
                </div>
            </div>
        </section>
    </div>
</div>