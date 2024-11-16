<?php
if(is_array($accounts)){
    extract($accounts);
}
?>
<div class="main-content">
        <div class="list_product-heading df-center align-items-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Sửa tài khoản</h1>
        </div>
    <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
        <div class="block">
            <?php
                if(isset($_SESSION['username'])&& is_array($_SESSION['username'])){
                    extract($_SESSION['username']);
                }
            ?>
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" placeholder="Tự động" value="<?=$id?>" disabled class="form-control">
            </div>

            <div class="form-group">
                <label for="">Họ tên</label>
                <input type="text" name="fullname" value="<?=$fullname?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="username" value="<?=$username?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" name="password" value="<?=$password?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="<?=$email?>"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">SĐT</label>
                <input type="text" name="phone"  value="<?=$phone?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" value="<?=$address?>"  class="form-control">
            </div>
        </div>
        <div class="cta-form mt20">
            <button type="submit" class="btn btn-form " value="them" name="btn-submit">Thêm tài khoản</button>
            <a href="?act=listAccounts" class="btn btn-form">Danh sách</a>
        </div>

    </form>
</div>