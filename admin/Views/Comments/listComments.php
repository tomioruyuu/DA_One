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
                    <th>Hình ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng bình luận</th>
                    <th>Chức năng</th>
                </thead>
                <tbody class="body-comment_admin">
                    <?php
                    foreach ($listComments as $comments) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td class="comments_admin-img"><img src="<?php echo $comments->img ?>" alt=""></td>
                            <td class="comments_admin-name">
                                <p class="name"><?php echo $comments->name ?></p>
                            </td>
                            <td><?php echo $comments->quantity ?></td>
                            <td>
                                <a href="?act=commentsDetail&id=<?php echo $comments->id ?>" class="btn btn-info btn-function">Xem chi tiết</a>

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