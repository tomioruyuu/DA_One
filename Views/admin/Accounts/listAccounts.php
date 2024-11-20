
<div class="col-10 body-content">
    <div class="list-product">
        <div class="list_product-heading df-center align-items-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Danh mục tài khoản</h1>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <th></th>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($listAccounts as $accounts) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo $accounts->id ?></td>
                            <td><?php echo $accounts->fullname ?></td>
                            <td><?php echo $accounts->username ?></td>
                            <td><?php echo $accounts->password ?></td>
                            <td><?php echo $accounts->email ?></td>
                            <td><?php echo $accounts->phone ?></td>
                            <td><?php echo $accounts->address ?></td>
                            <td>
                                <button class="btn btn-warning btn-function">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <a href="?act=editAccounts&id=<?php echo $accounts->id ?>">Sửa</a>
                                </button>
                                <button onclick="confirmDelete('?act=deleteAccounts&id=<?= $accounts->id ?>')" class="btn btn-danger btn-function">
                                    <i class="fa-solid fa-trash"></i>
                                    Xóa
                                </button>
                        </tr>

                        <?php
                    }
                ?>
            </tbody>
        </table>
        <div class="list-cta">
            <button class="btn">Chọn tất cả</button>
            <button class="btn">Xóa mục đã chọn</button>
            <a href="?act=addAccounts" class="btn">Thêm</a>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        if(window.confirm("Bạn có chắc chắn muốn xóa không")) {
            window.location = url
        }
    }
</script>
