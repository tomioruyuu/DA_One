<?php require_once("./modules/templates/header-guest.php") ?>
<section class="search">
    <div class="main-content">
        <div class="search-content">
            <div class="filter col-2">
                <h2 class="title">Lọc sản phẩm</h2>
                <form action="?act=search" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="category" id="" class="form-control">
                            <option value="">Lựa chọn</option>
                            <?php
                            foreach ($listCate as $item) {
                            ?>
                                <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Giá tiền</label>
                        <select name="price" id="" class="form-control">
                            <option value="">Lựa chọn</option>
                            <option value="price < 200"> Dưới 200.000</option>
                            <option value="price >= 200 and price < 500">200.000 - 500.000</option>
                            <option value="price >= 500">Trên 500.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Sắp xếp</label>
                        <select name="sort" id="" class="form-control">
                            <option value="">Lựa chọn</option>
                            <option value="DESC">Giảm dần</option>
                            <option value="ASC">Tăng dần</option>
                        </select>
                    </div>
                    <button class="filter-btn mt-10" name="search-btn">Lọc</button>
                </form>
            </div>
            <div class="search-list mb-20 col-10">
                <?php
                foreach ($listProduct as $item) {
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
</section>