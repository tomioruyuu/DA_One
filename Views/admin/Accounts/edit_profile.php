<div class="edit-profile-container">
        <h1 class="title">Chỉnh sửa hồ sơ</h1>
        <form class="edit-profile-form" method="POST" >
            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <input type="file" id="avatar" name="avatar">
            </div>
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" id="username" name="username" value="abc" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="abc@example.com" required>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn save-btn"><a href="?act=listAccounts">Lưu thay đổi</a></button>
                <button type="button" class="btn cancel-btn" onclick="history.back()"><a href="?act=listAccounts">Hủy bỏ</a></button>
            </div>
        </form>
    </div>