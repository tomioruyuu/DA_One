<?php require_once("./modules/templates/header-guest.php") ?>

<div class="main-content">
    <div class="yours-content mt-30">
        <table class="table table-yours">
            <thead>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Sản phẩm</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </thead>
            <tbody>
                <?php
                foreach ($listOrders as $item) {
                    // Giải mã JSON từ trường `san_pham`
                    $products = json_decode('[' . $item->product . ']', true); // Thêm dấu [] để chuyển thành mảng JSON hợp lệ

                    // Lấy sản phẩm đầu tiên
                    $firstProduct = $products[0];
                ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->create_at; ?></td>
                        <td class="yours-item">
                            <div class="item-content">
                                <img src="<?php echo $firstProduct['img']; ?>" alt="Product Image" style="width: 50px; height: 50px;">
                                <p class="name">
                                    <?php echo $firstProduct['name']; ?>
                                    (<?php echo $firstProduct['quantity']; ?> x
                                    <?php echo number_format($firstProduct['unitPrice'], 3, '.', ','); ?>)
                                </p>
                            </div>
                            <?php
                            // Kiểm tra số lượng sản phẩm khác
                            if (count($products) > 1) {
                                echo '<p class="badge badge-primary">+' . (count($products) - 1) . ' sản phẩm khác</p>';
                            }
                            ?>
                        </td>
                        <td><?php echo number_format($item->total, 3, '.', ','); ?></td>
                        <td><?php echo $item->status; ?></td>
                        <td class="yours-actions">
                            <a href="#" class="btn btn-info">Chi tiết</a>
                            <a href="#" class="btn btn-danger">Hủy</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>


        </table>
    </div>
</div>