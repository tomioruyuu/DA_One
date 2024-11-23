<?php require_once("./layout/header-admin.php") ?>
<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>
    <div class="main-content body-content mt20">
        <div class="list_product-heading df-center align-items-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Sửa tài khoản</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
            <div class="block">
                <div class="form-group">
                    <label for="">Mã tài khoản</label>
                    <input type="number" placeholder="Tự động" disabled class="form-control" value="<?php echo $itemAccount->id ?>">
                </div>

                <div class="form-group">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $itemAccount->username ?>">
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="text" name="password" class="form-control" value="<?php echo $itemAccount->password ?>">
                </div>

                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $itemAccount->email ?>">
                </div>

                <div class="form-group">
                    <label for="">SĐT</label>
                    <input type="number" name="phone" class="form-control" value="<?php echo $itemAccount->phone ?>">
                </div>

                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $itemAccount->address ?>">
                </div>
            </div>
            <div class="cta-form mt20">
                <button type="submit" class="btn btn-form " value="them" name="btn-submit-accounts">Sửa tài khoản</button>
                <a href="?act=listAccounts" class="btn btn-form">Danh sách</a>
            </div>

        </form>
    </div>
</div>