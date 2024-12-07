<?php require_once("./layout/header-admin.php") ?>
<div class="d-flex">
    <?php require_once("./layout/right-section.php") ?>
    <div class="col-10 body-content">
        <div class="list-product">
            <div class="list_product-heading df-center align-items-center">
                <div class="title-line"></div>
                <h1 class="title-list-product">Chi tiết đơn hàng</h1>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                    <th></th>
                    <th>ID</th>
                    <th>Id_orders</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <!-- <th>Chức năng</th> -->
                </thead>
                <tbody>
                    <?php
                    foreach ($listOrders as $orders) {
                    ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?php echo $orders->id ?></td>
                            <td><?php echo $orders->id_orders ?></td>
                            <td><?php echo $orders->name ?></td>
                            <td><?php echo $orders->unitPrice ?></td>
                            <td><?php echo $orders->quantity ?></td>
                            <!-- <td>
                                <button onclick="confirmDelete('?act=deleteOrdersDetail&id=<?php echo $orders->id ?>')" class="btn btn-danger btn-function">
                                    <i class="fa-solid fa-trash"></i>
                                    Xóa
                                </button>
                            </td> -->
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="list-cta">
                <button class="btn">Chọn tất cả</button>
                <button class="btn">Xóa mục đã chọn</button>
                <a href="?act=listOrders" class="btn">Danh sách đơn hàng</a>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(url) {
        if (window.confirm("Bạn có chắc chắn muốn xóa không")) {
            window.location = url
        }
    }
</script>