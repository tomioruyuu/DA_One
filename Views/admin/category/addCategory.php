
<div class="main-content">
        <div class="list_product-heading df-center align-items-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Danh mục sản phẩm</h1>
        </div>
    <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
        <div class="block">
            <div class="form-group">
                <label for="">Mã danh mục</label>
                <input type="text" placeholder="Tự động" disabled class="form-control">
            </div>

            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" name="name_cate"  class="form-control">
                <p class="text-danger"><?php echo isset($errors["name_cate"]) ? $errors["name_cate"]["required"] : null ?></p>
            </div>
        </div>
        <div class="cta-form mt20">
            <button type="submit" class="btn btn-form " value="them" name="btn-submit">Thêm danh mục</button>
            <a href="?act=listCategory" class="btn btn-form">Danh sách</a>
        </div>

    </form>
</div>