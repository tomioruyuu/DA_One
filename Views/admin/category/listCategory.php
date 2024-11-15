<?php 
    
?>

<div class="main-content body-content">
    <div class="list-product">
        <div class="list_product-heading df-center align-items-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Danh mục sản phẩm</h1>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <th></th>
                <th>Mã loại</th>
                <th>Tên</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($listCategory as $item) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo $item->id ?></td>
                            <td><?php echo $item->name ?></td>
                            <td>
                                <button class="btn btn-warning btn-function">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <a href=""> Sửa</a>
                                </button>
                                <button class="btn btn-danger btn-function">
                                    <i class="fa-solid fa-trash"></i>
                                    <a href=""> Xóa</a>
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
            <a href="?act=addCategory" class="btn">Thêm</a>
        </div>
    </div>
</div>
