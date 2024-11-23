<?php require_once("./layout/header-admin.php") ?>
<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>
    <div class="main-content mt-30 body-content">
        <div class="list_product-heading df-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Sửa sản sản phẩm</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
            <div class="block">
                <div class="form-group">
                    <label for="">Mã sản phẩm</label>
                    <input type="text" placeholder="Tự động" disabled class="form-control" value="<?php echo $dataProduct->id ?>">

                </div>

                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $dataProduct->name ?>">
                    <p class="text-danger">
                        <?php
                        show_err_message($errors, "name")
                        ?>
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" class="form-control" name="price" value="<?php echo $dataProduct->price ?>">
                    <p class="text-danger">
                        <?php
                        show_err_message($errors, "price")
                        ?>
                    </p>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" class="form-control" name="img">
                    <img src="<?php echo $dataProduct->img ?>" class="table-product_img" alt="">
                    <p class="text-danger">
                        <?php
                        show_err_message($errors, "img")
                        ?>
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $dataProduct->quantity ?>">
                    <p class="text-danger">
                        <?php
                        show_err_message($errors, "quantity")
                        ?>
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $dataProduct->desciption ?>">
                    <p class="text-danger">
                        <?php
                        show_err_message($errors, "description")
                        ?>
                    </p>
                </div>

                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="id_category" class="form-control" id="" value="<?php echo $dataProduct->id_category ?>">
                        <option value="">Chọn danh mục</option>
                        <?php
                        foreach ($listIdCate as $item) {
                            if ($item->id == $dataProduct->id_category) {
                        ?>
                                <option selected value="<?php echo $item->id ?>"> <?php echo $item->name ?></option>
                            <?php
                            }
                            ?>
                            <option value="<?php echo $item->id ?>"> <?php echo $item->name ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <p class="text-danger">
                        <?php
                        show_err_message($errors, "id_category")
                        ?>
                    </p>
                </div>
            </div>
            <div class="cta-form mt20">
                <a href="?act=listProduct" class="btn btn-form">Danh sách sản phẩm</a>
                <button class="btn btn-form" name="btn-edit" value="them">Sửa sản phẩm</button>
            </div>
        </form>
    </div>
</div>