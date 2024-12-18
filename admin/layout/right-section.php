<div class="col-2 right-section">
    <div class="header-admin-user df-center flex-column">
        <div class="header-action header-user">
            <i class="fa-regular fa-circle-user user-admin" style="color: #ffffff;"></i>
        </div>
        <p class="admin-name-user">Tên người dùng</p>
    </div>
    <ul class="admin-navigate">
        <li>
            <i class="fa-solid fa-gauge "></i>
            <a href="?act=dashboard">Trang chủ</a>
        </li>
        <li>
            <i class="fa-solid fa-table-cells-large"></i>
            <a href="?act=listCategory">Danh mục</a>
        </li>
        <li>
            <i class="fa-solid fa-cubes"></i>
            <a href="?act=listProduct">Sản phẩm</a>
        </li>
        <li>
            <i class="fa-solid fa-users"></i>
            <a href="?act=listAccounts">Tài khoản</a>
        </li>
        <li>
            <i class="fa-regular fa-comment-dots"></i>
            <a href="?act=listComments">Bình luận</a>
        </li>
        <li>
            <i class="fa-solid fa-cart-arrow-down"></i>
            <a href="?act=listOrders">Đơn hàng</a>
        </li>
        <li>
            <i class="fa-solid fa-scale-balanced"></i>
            <a href="?act=listSales">Chương trình ưu đãi</a>
        </li>
        <li>
            <i class="fa-solid fa-chart-simple"></i>
            <a href="?act=statistic">Thống kê</a>
        </li>
        <li>
            <i class="fa-solid fa-right-from-bracket"></i>
            <p onclick="check('?act=logout')">Đăng xuất</p>
        </li>

    </ul>
</div>

<script>
    function check(url) {
        if (window.confirm("Bạn có chắc chắn muốn đăng xuất không")) {
            window.location = url
        }
    }
</script>