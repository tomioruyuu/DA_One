<?php require_once("./layout/header-admin.php") ?>
<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>
    <div class="col-10 body-content">
        <div class="list-product">
            <div class="list_product-heading df-center align-items-center">
                <div class="title-line"></div>
                <h1 class="title-list-product">Danh mục bình luận</h1>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                    <th></th>
                    <th>ID</th>
                    <th>ID Users</th>
                    <th>Sản phẩm</th>
                    <th>Nội dung bình luận</th>
                    <th>Ngày bình luận</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($listComments as $comments) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo $comments->id ?></td>
                            <td><?php echo $comments->id_users ?></td>
                            <td><?php echo $comments->id_products ?></td>
                            <td><?php echo $comments->content ?></td>
                            <td><?php echo $comments->ngaybinhluan ?></td>
                            <td>
                                <button onclick="confirmDelete('?act=deleteComments&id=<?php echo $comments->id ?>')" class="btn btn-danger btn-function">
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
                <a href="?act=addCategory" class="btn">Thêm</a>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        if (window.confirm("Bạn có chắc chắn muốn xóa không")) {
            window.location = url
        }
    }
</script>