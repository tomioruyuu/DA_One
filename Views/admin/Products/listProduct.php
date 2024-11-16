<div class="col-10 body-content">
    <form class="list-product">
        <div class="list_product-heading df-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Danh sách sản phẩm</h1>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <th></th>
                <th>Mã sản phẩm</th>
                <th class="table-product_name">Tên</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($listProducts as $item) {
                        ?>
                        <tr class="">
                            <td><input type="checkbox" ></td>
                            <td><?php echo $item->id ?></td>
                            <td ><?php echo $item->name ?></td>
                            <td><?php echo $item->price ?></td>
                            <td><img class="table-product_img" src="<?php echo $item->img ?>" alt=""></td>
                            <td><?php echo $item->quantity ?></td>
                            <td class="table-product_desc"><?php echo $item->desciption ?></td>
                            <td>
                                <button class="btn btn-warning btn-function">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <a href="?act=editProduct&id=<?php echo $item->id ?>">Sửa</a>
                                </button>
                                <button onclick="confirmDelete('?act=deleteProduct&id=<?php echo $item->id ?>')" class="btn btn-danger btn-function">
                                    <i class="fa-solid fa-trash"></i>
                                    Xóa
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <div class="list-cta">
            <button class="btn">Chọn tất cả</button>
            <button class="btn">Xóa mục đã chọn</button>
            <a href="?act=addProduct" class="btn">Thêm</a>
        </div>
    </form>
</div>

<script>
    function confirmDelete(url) {
        if(window.confirm("Bạn có chắc chắn muốn xóa không")) {
            window.location = url
        }
    }
</script>