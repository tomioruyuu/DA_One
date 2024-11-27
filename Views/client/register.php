<?php require_once("./modules/templates/header-guest.php") ?>

<div class="body-register">
    <h1>Đăng ký tài khoản</h1>
    <form class="form-login" action="" method="post" enctype="multipart/form-data">
        <div class="form-content">
            <div class="login-item">
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="fullname" class="form-control" value="<?php show_old_value($old_value, "fullname") ?>">
                </div>
                <div class="form-group">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" class="form-control" required name="username" value="<?php show_old_value($old_value, "username") ?>">
                    <p class="text-danger"><?php show_err_message($errors, "username") ?></p>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" required name="email" value="<?php show_old_value($old_value, "email") ?>">
                    <p class="text-danger"><?php show_err_message($errors, "email") ?></p>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" required class="form-control" value="<?php show_old_value($old_value, "phone") ?>">
                    <p class="text-danger"><?php show_err_message($errors, "phone") ?></p>

                </div>
            </div>
            <div class="login-item">
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" required class="form-control" value="<?php show_old_value($old_value, "address") ?>">
                    <p class="text-danger"><?php show_err_message($errors, "address") ?></p>

                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" required name="pass">
                    <p class="text-danger"><?php show_err_message($errors, "pass") ?></p>
                </div>
                <div class="form-group">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" required name="pass_confirm">
                    <p class="text-danger"><?php show_err_message($errors, "pass_confirm") ?></p>
                </div>
            </div>
        </div>

        <button class=" register-btn mt20" name="register-btn">Đăng ký</button>
        <hr>
        <div class="register-cta d-flex align-items-center">
            <p>Bạn đã có tài khoản? </p>
            <a href="?act=login">Đăng nhập</a>
        </div>
    </form>
</div>