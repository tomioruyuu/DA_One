<?php require_once("./modules/templates/header-guest.php") ?>


<div class="main-content mt-30">
    <div class="content-info">
        <section class="order-summary">
            <h2>Sản phẩm</h2>
            <div class="list-order">
                <?php
                if (!empty($listProduct)) {
                    foreach ($listProduct as $item) {
                ?>

                        <div class="cart-cart-item ">
                            <img src="<?php echo $item->img ?>" alt="Áo sơ mi" class="cart_product-img">
                            <div class="cart-product-info">
                                <p class="name"><?php echo $item->name ?></p>
                                <p class="size">Size: <?php echo $item->size ?></p>
                                <p class="quantity-info">Số lượng: <?php echo $item->quantity ?></p>
                                <p class="cart-price">₫<?php echo $item->price ?></p>
                            </div>

                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <div class="discount mt20">
                <input type="text" placeholder="Mã giảm giá" class="form-control">
                <button>Sử dụng</button>
            </div>
            <div class="summary mt20">
                <p>Tạm tính: <span>₫<?php echo $totalPrice->total ?></span></p>
                <p>Phí vận chuyển: <span><?php echo $totalPrice->total > 1000 ? "Miễn phí" : "₫30.000" ?></span></p>
                <p class="total">Tổng cộng: <span>₫<?php echo number_format($totalPrice->total > 1000 ? $totalPrice->total : $totalPrice->total + 30.000, 3,  '.', '.'); ?></span></p>
            </div>
        </section>

        <section class="delivery-info">
            <h2>Phương thức vận chuyển</h2>
            <div class="shipping-fee mt-10">
                <p>Phí vận chuyển</p>
                <p><?php echo $totalPrice->total > 1000 ? "Miễn phí" : "₫30.000" ?></p>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="mt20">
                <h2>Phương thức thanh toán</h2>
                <div class="form-content">
                    <div class="form-group">
                        <input type="radio" name="method" id="" value="Thanh toán khi nhận hàng" required>
                        <label>Thanh toán khi nhận hàng(COD)</label>
                    </div>
                </div>
                <div class="info-cta">
                    <a href="?act=cart">Giỏ hàng</a>
                    <button name="btn-method" class="info-btn mt20">Hoàn tất đơn hàng</button>
                </div>
            </form>
        </section>


    </div>

</div>