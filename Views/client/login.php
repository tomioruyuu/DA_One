<div class="body-login">
    <h1>Đăng nhập tài khoản</h1>
    <form  class="form-login" action="" method="post" enctype="multipart/form-data"> 
        <?php getSmg($smg, $smg_type) ?>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" required name="email">
        </div>
        <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" class="form-control" required name="pass">
        </div>
        <p class="forgot-pass mt-10">Quên mật khẩu?</p>
        <button class=" login-btn mt20" name="login-btn">Đăng nhập</button>
        <hr>

    </form>
</div>