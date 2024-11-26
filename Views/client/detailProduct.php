<?php require_once("./modules/templates/header-guest.php") ?>
<?php ?>

<div class="main-content">
    <div class="detail-content product-container">
        <div class="product-image">
            <img src="<?php echo $product->img ?>" alt="Hình ảnh sản phẩm">
            <div class="thumbnail-container">
                <img class="thumbnail" src="thumb1.jpg" alt="Ảnh phụ 1" onclick="changeImage('thumb1.jpg')">
                <img class="thumbnail" src="thumb2.jpg" alt="Ảnh phụ 2" onclick="changeImage('thumb2.jpg')">
                <img class="thumbnail" src="thumb3.jpg" alt="Ảnh phụ 3" onclick="changeImage('thumb3.jpg')">
                <img class="thumbnail" src="thumb4.jpg" alt="Ảnh phụ 4" onclick="changeImage('thumb4.jpg')">
            </div>
        </div>
        <div class="product-info">
            <h1><?php echo $product->name ?></h1>
            <p class="product-price">
                <span class="current-price">₫<?php echo $product->price ?></span>
            </p>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group size-group">
                    <label for="">Size:</label>
                    <select name="size" id="">
                        <option value="">Chọn size</option>
                        <option value="36">S</option>
                        <option value="37">M</option>
                        <option value="38">L</option>
                        <option value="39">XL</option>
                        <option value="40">XXL</option>
                        
                    </select>
                    <p class="text-danger">
                        <?php show_err_message($errors, "size") ?>
                    </p>
                </div>

                <div class="quantity-group d-flex align-items-center form-group">
                    <h2>Số lượng:</h2>
                    <div class="form-group detail-quantity d-flex align-items-center">
                        <p onclick="decrease(id)">-</p>
                        <input class="quantity-product" type="text" value="1" name="quantity" min="1">
                        <p onclick="increase(id)">+</p>
                    </div>
                </div>

                <div class="endow">
                    <h3>Ưu đãi:</h3>
                    <ul class="list-endow">
                        <li><i class="fa-solid fa-newspaper"></i>Miễn phí chỉnh sửa</li>
                        <li><i class="fa-solid fa-truck"></i>Miễn phí ship đơn từ 1,000,000đ</li>
                        <li><i class="fa-solid fa-handshake-angle"></i>Hỗ trợ 24/7</li>
                        <li><i class="fa-regular fa-square-check"></i>Mua hàng tích điểm</li>
                        <li><i class="fa-solid fa-heart"></i>Mở hộp kiểm tra nhận hàng</li>
                        <li><i class="fa-solid fa-rotate-left"></i>Đổi trả nhanh chóng</li>
                    </ul>
                </div>

                <div class="short-describe">
                    <p>Mô tả ngắn: </p>
                    <p class="content"><?php echo $product->desciption ?></p>
                </div>

                <div class="detail-cta">
                    <button class=" add-to-cart" name="btn_add-cart">Thêm vào giỏ</button>
                    <button class="buy-now">Mua ngay</button>
                </div>

            </form>

        </div>
    </div>

    <div class="comment">
        <h1 class="heading-detail">Bình luận</h1>
        <?php getSmg($smg, $smg_type) ?>
        <div class="comment-body">
            <?php
            if (empty($comments)) {
                $comments = [];
            }
            foreach ($comments as $item) {
            ?>
                <div class="comment-item">
                    <div class="c-user">
                        <?php
                        if (!empty($item->avatar)) {
                        ?>
                            <img src="<?php echo $item->avatar ?>" alt="" class="avatar-detail">
                        <?php
                        } else {
                        ?>
                            <i class="fa-solid fa-circle-user" style="color: #74C0FC;"></i>
                        <?php
                        }
                        ?>
                        <div class="c-user_info">
                            <p class="name"><?php echo $item->username ?></p>
                            <p class="time"><?php echo $item->ngaybinhluan ?></p>
                        </div>
                    </div>
                    <p class="c-content"><?php echo $item->content ?></p>
                </div>
                <hr>
            <?php
            }
            ?>

        </div>
        <form action="" method="post" class="comment-action">
            <textarea name="content" id="autoHeightTextArea" rows="1" placeholder="Type a message"></textarea>
            <button type="submit" name="send_comment"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
    </div>

    <div class="similar">
        <h1>Sản phẩm tương tự</h1>
        <div class="search-list mt20 mb-20 col-10">
            <?php
            foreach ($listSimilarProduct as $item) {
            ?>
                <a class="item" href="?act=productDetail&id=<?php echo $item->id ?>">
                    <div class="collection-list_item">
                        <img src="<?php echo $item->img ?>" alt="">
                        <div class="collection-list_item-body">
                            <p class="name"><?php echo $item->name ?></p>
                            <p class="price">₫<?php echo $item->price ?></p>
                            <div class="cart d-flex align-items-center">
                                <p>Thêm vào giỏ hàng</p>
                                <i class="fa-solid fa-cart-shopping ml-10"></i>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    // Hàm thay đổi ảnh chính khi click vào ảnh phụ
    function changeImage(imageSrc) {
        document.getElementById('main-image').src = imageSrc;
    }

    // Hàm tăng số lượng
    function increase(id) {
        const quantityInput = document.querySelector('.quantity-product');
        let currentValue = parseInt(quantityInput.value);

        if (!isNaN(currentValue)) {
            quantityInput.value = currentValue + 1;
        } else {
            quantityInput.value = 1;
        }
    }

    // Hàm giảm số lượng
    function decrease(id) {
        const quantityInput = document.querySelector('.quantity-product');
        let currentValue = parseInt(quantityInput.value);

        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        } else {
            quantityInput.value = 1; // Không cho giảm dưới 1
        }
    }
</script>