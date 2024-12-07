<?php require_once("./layout/header-admin.php") ?>
<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>
    <div class="col-10 body-content">
        <div class="list-product">
            <div class="list_product-heading df-center align-items-center">
                <div class="title-line"></div>
                <h1 class="title-list-product">Chi tiết  bình luận</h1>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                    <th></th>
                    <th>Người bình luận</th>
                    <th>Nội dung </th>
                    <th>Thời gian</th>
                    <th>Chức năng</th>
                </thead>
                <tbody class="body-comment_admin">
                    <?php
                    foreach ($listComments as $comments) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo $comments->username ?></td>
                            <td class="comments_admin-name">
                                <p class="name"><?php echo $comments->content ?></p>
                            </td>
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