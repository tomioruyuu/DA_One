<div class="body-login">
    <h1>Đăng ký tài khoản</h1>
    <form class="form-login" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Tên đăng nhập</label>
            <input type="text" class="form-control" required name="username">
            <p class="text-danger"><?php show_err_message($errors, "username") ?></p>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" required name="email">
            <p class="text-danger"><?php show_err_message($errors, "email") ?></p>
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
        <button class=" login-btn mt20" name="register-btn">Đăng ký</button>
        <hr>
        <div class="register-cta d-flex align-items-center">
            <p>Bạn đã có tài khoản? </p>
            <a href="?act=login">Đăng nhập</a>
        </div>
    </form>
</div>