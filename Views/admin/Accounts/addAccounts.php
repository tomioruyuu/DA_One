<div class="col-10 body-content mt20">
    <div class="list_product-heading df-center align-items-center">
        <div class="title-line"></div>
        <h1 class="title-list-product">Thêm tài khoản</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
        <div class="block">
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" placeholder="Tự động" disabled class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">SĐT</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" class="form-control">
            </div>
        </div>
        <div class="cta-form mt20">
            <button type="submit" class="btn btn-form " value="them" name="btn-submit-addAccounts">Thêm tài khoản</button>
            <a href="?act=listAccounts" class="btn btn-form">Danh sách</a>
        </div>

    </form>
</div>