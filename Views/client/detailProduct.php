<?php require_once("./modules/templates/header-guest.php") ?>
<div class="main-content">
    <div class="detail-contetnt">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 detail-r" >
                <img src="./modules/images/luxury.jpg" alt="">
                <div class="row mt-5">
                <div class="row">
                    <div class="col">
                        <p style="font-size: 40px;">Bình luận</p>
                        <fieldset>
                            <div class="detail-row">
                                <!-- Avatar -->
                                <img class="detail-avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar">
                                
                                <!-- Textarea với nút gửi -->
                                <div class="detail-form-group">
                                    <textarea class="detail-form-control" id="detail-message" placeholder="Your message" required></textarea>
                                    <i class="fas fa-paper-plane detail-send-icon" title="Gửi"></i>
                                </div>
                            </div>
                        </fieldset>
                       <hr>
                    </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 detail-r">
                <div>
                    <div class="display-5 detailt-name">ÁO</div>
                    <div class="d-flex align-items-center gap-3 detailt-price mt-4">
                        <p>Giá:</p>
                        <p class="text-danger">80.000 VNĐ</p>
                        <p class="text-muted text-decoration-line-through me-3 fs-3">100.000 VNĐ</p>
                    </div>
                    <div class="input-group d-flex align-items-center detailt-number mt-4">
                        <p class="mb-0 me-3">Số lượng:</p> 
                        <button class="btn btn-outline-primary" type="button" id="btn-decrease">-</button>
                        <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="50" style="max-width: 80px;">
                        <button class="btn btn-outline-primary" type="button" id="btn-increase">+</button>
                    </div>
                    
                    <div class="d-flex gap-3 detailt-button mt-4">
                        <div class="mt-4 flex-fill">
                            <a href="" class="btn btn-white btn-lg w-100">
                                <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                            </a>
                        </div>
                        <div class="mt-4 flex-fill">
                            <a href="" class="btn btn-white btn-lg w-100">
                                <i class="bi bi-cart-plus"></i> Mua ngay
                            </a>
                        </div>
                    </div>


                    <div class="container mt-5">
                    
                        <div class="d-flex justify-content-between">
                            <!-- Mục 1 -->
                            <div class="detail-text-item">
                                <p>Miễn phí chỉnh sửa</p>
                            </div>
                            <!-- Mục 2 -->
                            <div class="detail-text-item">
                                <p>Miễn phí ship đơn từ 1,000,000đ</p>
                            </div>
                            <!-- Mục 3 -->
                            <div class="detail-text-item">
                                <p>Hỗ trợ 24/7</p>
                            </div>
                        </div>

                        <!-- Các mục tiếp theo -->
                        <div class="d-flex justify-content-between mt-4">
                            <!-- Mục 4 -->
                            <div class="detail-text-item">
                            <p>Mua hàng tích điểm</p>
                            
                            </div>
                            <!-- Mục 5 -->
                            <div class="detail-text-item">
                                <p>Mở hộp kiểm tra nhận hàng</p>
                            </div>
                            <!-- Mục 6 -->
                            <div class="detail-text-item">
                                <p>Đổi trả nhanh chóng</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                        <p style="font-size: 40px;">Mô tả</p>
                        <hr class="hr-thick">
                        <p style="font-size: 20px;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit
                            arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.
                        </p>
                </div>
            </div>
            <div class="container mt-5">
        <h1>Sản phẩm liên quan</h1>
    </div>
        </div>
    </div>
    </div>
 </div>
</div>