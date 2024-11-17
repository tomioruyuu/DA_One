<div class="signup-container">
        <h1 class="signup-title">Tạo một tài khoản</h1>
        <form class="signup-form" action="#" method="POST">
            <div class="form-group">
                <label for="username">Full Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn signup-btn"><a href="?act=listAccounts">Đăng ký</a></button>
            </div>
            <div class="signup-footer">
                <p><a href="">Bạn đã có tài khoản?</a> <a href="#" class="login-link"><a href="?act=login">Đăng nhập</a></a></p>
            </div>
        </form>
    </div>