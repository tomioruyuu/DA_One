<?php require_once("./modules/templates/header-guest.php") ?>

<div class="main-content">
    <!--  slide show -->
    <section class="banner">
        <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="./modules/images/slide_1_img.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="./modules/images/slide_4_img.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="./modules/images/slide_3_img.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </section>

    <!-- danh mục -->
    <section class="cate-img mt-30 d-flex align-items-center justify-content-between">
        <?php 
            foreach ($listCateWithImg as $item) {
                ?>
                    <div class="cate-img_item">
                        <img src="<?php echo $item->img ?>" alt="">
                        <div class="cate-item_content">
                            <p class="name"><?php echo $item->name ?></p>
                            <a href="" class="more-info">Xem ngay</a>
                        </div>
                    </div>
                <?php
            }
        ?>
    </section>

    <!-- Bộ sự tập mới -->
    <section class="new-collection">
        <h1 class="heading-section">Bộ sưu tập mới</h1>
        <div class="collection-list mb-20 mt20">
            <?php 
                foreach ($listProduct as $item) {
                    ?>
                    <a href="?act=productDetail&id=<?php echo $item->id ?>">
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
        <a class="btn btn-more mt20">Xem thêm</a>
    </section>

    <!-- phần luxury -->
     <section class="luxury d-flex justify-content-between">
        <div class="luxury-info ">
            <h1 class="heading-section">Sản phẩm nổi bật</h1>
            <div class="luxury-body d-flex align-items-center mt-30">
                <div class="luxury-list">
                    <?php 
                        foreach ($listProductLuxury as $item) {
                            ?>
                            <a href="?act=productDetail&id=<?php echo $item->id ?>">
                                <div class="item d-flex">
                                    <img src="<?php echo $item->img ?>" alt="">
                                    <div class="item-body">
                                        <p class="name"><?php echo $item->name ?></p>
                                        <p class="price">₫<?php echo $item->price ?></p>
                                    </div>
                                </div>
                            </a>
    
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="img-luxury_main">
            <img class="ml-10" src="./modules/images/luxury.jpg" alt="">
        </div>
     </section>
</div>

