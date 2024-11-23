<?php require_once("./modules/templates/header-guest.php") ?>
<div class="main-content">
    <div class="cart-container">
        <div class="cart-cart col-9">
            <h2>Giỏ hàng của bạn</h2>
            <div class="cart-cart-item ">
                <img src="shirt.jpg" alt="Áo sơ mi" class="cart_product-img">
                <div class="cart-product-info">
                    <p class="name">Áo sơ mi trắng nam công sở dài tay Merriman mã THMOL495</p>
                    <p class="size"></p>
                    <p class="cart-price">399,000₫</p>
                </div>
                <div class="item-cart_cta">
                    <p class="text-center">Xóa</p>
                    <div class="cart-quantity">
                        <button onclick="decrease(id)">-</button>
                        <input class="quantity-product" type="text" value="1">
                        <button onclick="increase(id)">+</button>
                    </div>
                </div>
            </div>
            <div class="note">
                <h2>Ghi chú đơn hàng</h2>
                <textarea placeholder=""></textarea>
            </div>
        </div>
        <div class="order-summary col-3">
            <h2>Thông tin đơn hàng</h2>
            <div class="total-section">
                <span class="label">Tổng tiền:</span>
                <span class="total-price">390,273₫</span>
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
    let inputs = document.querySelectorAll(".quantity-product")

    function decrease(id) {
        if (inputs[id].value > 1) {
            inputs[id].value--;
        }
    }

    function increase(id) {
        inputs[id].value++
    }
</script>