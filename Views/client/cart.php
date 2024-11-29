<?php require_once("./modules/templates/header-guest.php") ?>
<div class="main-content">
    <div class="cart-container">
        <div class="cart-cart col-9">
            <h2>Giỏ hàng của bạn <i class="fa-solid fa-cart-shopping"></i></h2>
            <?php
            if (!empty($listProduct)) {
                foreach ($listProduct as $index => $item) {
            ?>

                    <div class="cart-cart-item ">
                        <img src="<?php echo $item->img ?>" alt="Áo sơ mi" class="cart_product-img">
                        <div class="cart-product-info">
                            <p class="name"><?php echo $item->name ?></p>
                            <p class="size">Kích thước: <?php echo $item->size ?></p>
                            <p class="cart-price">₫<?php echo $item->price ?></p>
                        </div>
                        <div class="item-cart_cta">
                            <p onclick="confirmDelete('?act=deleteCart&id=<?php echo $item->id ?>')" class="text-center">Xóa</p>
                            <div class="cart-quantity">
                                <button onclick="decrease(<?php echo $item->id ?>, <?php echo $index ?> )">-</button>
                                <input class="quantity-product" type="text" value="<?php echo $item->quantity ?>" min="1" name="quantity">
                                <button onclick="increase(<?php echo $item->id ?>, <?php echo $index ?>)">+</button>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>
            <div class="note mt-30">
                <h2>Ghi chú đơn hàng</h2>
                <textarea placeholder=""></textarea>
            </div>
        </div>
        <div class="order-summary col-3">
            <h2>Thông tin đơn hàng</h2>
            <div class="total-section">
                <span class="label">Tổng tiền:</span>
                <span class="total-price">₫<?php echo $totalPrice ? $totalPrice : 0 ?></span>
            </div>

            <hr class="divider">

            <ul class="promo-notes">
                <li>Miễn phí vận chuyển đơn hàng từ 1,000,000đ</li>
                <li>Vui lòng nhập <b>MÃ_UU_ĐÃI</b> tại trang thanh toán</li>
            </ul>

            <button class="checkout-button">THANH TOÁN</button>
        </div>

    </div>
</div>

<script>
    // Hàm tăng số lượng
    function increase(id, index) {
        let inputs = document.querySelectorAll('.quantity-product')
        const quantityInput = inputs[index]
        console.log(quantityInput);

        let currentValue = parseInt(quantityInput.value);

        if (!isNaN(currentValue)) {
            quantityInput.value = currentValue + 1;
        } else {
            quantityInput.value = 1;
        }
    }

    // Hàm giảm số lượng
    function decrease(id, index) {
        let inputs = document.querySelectorAll('.quantity-product')
        const quantityInput = inputs[index]
        console.log(quantityInput);

        let currentValue = parseInt(quantityInput.value);


        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        } else {
            quantityInput.value = 1; // Không cho giảm dưới 1
        }
    }

    // Hàm xác nhận xóa
    function confirmDelete(url) {
        if (window.confirm("Bạn có chắc chắn muốn xóa không?")) {
            window.location = url;
        }
    }
</script>