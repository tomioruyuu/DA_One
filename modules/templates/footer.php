<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <footer>
        <div class="main-content">
            <div class="footer-content">
                <section class="footer-coumn1 footer-column">
                    <ul>
                    <h3 class="title">Về chúng tôi</h3>
                    <li>
                        <p class="desc-g7">Thương hiệu thời trang cao cấp, tự hào là lựa chọn hàng đầu của phái mạnh hiện đại. G7 Creative không chỉ mang đến phong cách thời trang đẳng cấp mà còn là sự kết hợp tinh tế giữa kỹ thuật sản xuất tiên tiến và chất liệu hoàn hảo. Với cam kết không ngừng đổi mới, các sản phẩm của G7 Creative luôn tạo nên sự khác biệt về form dáng, chất lượng, và sự thoải mái vượt trội.</p>
                    </li>
                    <li class=" info-g7 d-flex align-items-center mt-10">
                        <i class="fa-solid fa-location-dot"></i>
                        <p>13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
                    </li>
                    <li class=" info-g7 d-flex align-items-center mt-10">
                        <i class="fa-solid fa-phone"></i>
                        <p>0836542169</p>
                    </li>
                    <li class=" info-g7 d-flex align-items-center mt-10">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="#">g7fashion@creative.vn</a>
                    </li>
                    
                </section>
                <section class="footer-coumn2 footer-column">
                    <ul>
                    <h3 class="title">Hỗ trợ khách hàng</h3>
                        <li>
                            <a href="#!">Hướng dẫn mua hàng </a>
                        </li>
                        <li>
                            <a href="#!">Điều khoản sử dụng</a>
                        </li>
                        <li>
                            <a href="#!">Chính sách đổi trả</a>
                        </li>
                        <li>
                            <a href="#!">Chính sách thẻ thành viên</a>
                        </li>
                    </ul>
                </section>
                <section class="footer-coumn3 footer-column">
                    <ul>
                        <h3 class="title">Liên kêt</h3>
                        <?php 
                            foreach ($listCate as $item) {
                                ?>
                                <li>
                                    <a href="#!"><?php echo $item->name ?></a>
                                </li>
                                <?php
                            }
                        ?>
                        
                    </ul>
                    
                </section>
                <section class="social">
                    <h3 class="title">Kết nối với chúng tôi</h3>
                    <div class="social-media__logo mt-10">
                        <img  src="./modules/images/facebook.png" alt="">
                        <img class="ml-10" src="./modules/images/instagram.png" alt="">
                        <img class="ml-10" src="./modules/images/youtube.png" alt="">
                    </div>
                    <h3 class="title mt20">Đăng ký nhận tin</h3>
                    <form action="" class="social-cta">
                        <input class="form-control mt-10" type="text" placeholder="Enter your email..." required>
                        <button class="btn-footer mt-10">Đăng ký</button>
                    </form>
                </section>
            </div>
        </div>
        <p class="copy_right">Copyright © 2024 Thời trang công sở cao cấp Merriman. Powered by Haravan</p>
    </footer>
    
<script src="modules/js/bootstrap.min.js"></script>
<script src="modules/js/main.js?ver=<?php echo rand()?>"></script>
</body>
</html>