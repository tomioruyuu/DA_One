<?php
require_once("./modules/templates/header-guest.php");
?>

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
                <p>Phí vận chuyển: <span>-</span></p>
                <p class="total">Tổng cộng: <span>₫<?php echo $totalPrice->total ?></span></p>
            </div>
        </section>

        <section class="shipping-info">
            <h2>Thông tin giao hàng</h2>
            <form class="mt20" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" id="name" required value="<?php echo $userInfo->fullname ?> ">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" required value="<?php echo $userInfo->email ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input class="form-control" type="text" id="phone" required value="<?php echo $userInfo->phone ?>">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input class="form-control" type="text" id="address" name="address" required value="<?php echo $userInfo->address ?>">
                </div>

                <div class="info-cta">
                    <a href="?act=cart">Giỏ hàng</a>
                    <button name="btn-info" class="info-btn mt20">Tiếp tục đến phương thức thanh toán</button>
                </div>
            </form>
        </section>


    </div>

</div>