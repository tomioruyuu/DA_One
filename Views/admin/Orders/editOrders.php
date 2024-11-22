<div class="main-content mt-30 body-content">
    <div class="list_product-heading df-center">
            <div class="title-line"></div>
            <h1 class="title-list-product">Thêm đơn hàng</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="add-product_content mt20">
        <div class="block">
            <div class="form-group">
                <label for="">Mã đơn hàng</label>
                <input type="text" placeholder="Tự động" disabled class="form-control">
                
            </div>

            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text"  class="form-control" name="name">
                <p class="text-danger">
                    <?php 
                        show_err_message($errors, "name")
                    ?>
                </p>
            </div>

            <div class="form-group">
                <label for="">Trạng thái đơn hàng</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">Chờ xác nhận</option>
                    <option value="2">Đang xác nhận</option>
                    <option value="3">Chờ xử lí</option>
                    <option value="4">Đang giao hàng</option>
                    <option value="5">Đã giao hàng</option>
                    <option value="6">Đã hoàn thành</option>
                    <option value="7">Đã hủy</option>
                    <option value="8">Hoàn trả/Đổi hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Hình thức thanh toán</label>
                <select class="form-select" name="create_at" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">COD</option>
                    <option value="2">Chuyển khoản</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text"  class="form-control" name="another_address">
                <p class="text-danger">
                    <?php 
                        show_err_message($errors, "another_address")
                    ?>
                </p>
            </div>

            <div class="form-group">
                <label for="">Ngày đặt</label>
                <input type="date"  class="form-control" name="description">
                <p class="text-danger">
                    <?php 
                        show_err_message($errors, "description")
                    ?>
                </p>
            </div>
        </div>
        <div class="cta-form mt20">
            <a href="?act=listProduct" class="btn btn-form">Danh sách sản phẩm</a>
            <button class="btn btn-form" name="btn-add" value="them">Thêm sản phẩm</button>
        </div>
    </form>
</div>