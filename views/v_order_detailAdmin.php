<div class="main-content">
    <div class="base-container-for-cart">
        <h1 class="title">Chi tiết đơn hàng</h1>
        <div class="cart-container">
            <table class="cart-table" border="1" style="width:100%">
                <div class="hello-row">
                    <h3 class="cart-hello title">Trạng thái:
                        <?php if ($order['status'] == 'Pending') : ?>
                            <span>Đang chờ xử lý</span>
                        <?php elseif ($order['status'] == 'Processing') : ?>

                            <span>Đang xử lý</span>
                        <?php elseif ($order['status'] == 'Delivered') : ?>
                            <span>Đã giao cho đơn vị vận chuyển</span>
                        <?php elseif ($order['status'] == 'Finish') : ?>
                            <span>Đã giao</span>
                        <?php else : ?>
                            <span>Đã hủy</span>
                        <?php endif; ?>
                    </h3>
                </div>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                <tbody>
                    <?php
                    $tong = 0;
                    $i = 1;
                    foreach ($order_detail as $sp) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><img src="public/img/All/<?= $sp['cover_image'] ?>" alt=""></td>
                            <td style="width:30%"><?= $sp['title'] ?></td>
                            <td>
                                <?php if (isset($sp['discounted_price'])) : ?>
                                    <p>
                                        <strong><?= number_format($sp['discounted_price']) ?><sup>đ</sup></strong>
                                        <del><?= number_format($sp['price']) ?><sup>đ</sup></del>
                                    </p>
                                <?php else : ?>
                                    <p>
                                        <?= number_format($sp['price']) ?><sup>đ</sup>
                                    </p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $sp['quantity'] ?>
                            </td>
                            <td>
                                <?php if (isset($sp['discounted_price'])) {
                                    $thanhTien = $sp['discounted_price'] * $sp['quantity'];
                                } else {
                                    $thanhTien = $sp['price'] * $sp['quantity'];
                                }
                                $tong += $thanhTien;
                                ?>
                                <?= number_format($thanhTien) ?><sup>đ</sup>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <td colspan="5">Tổng cộng</td>
                    <td><?= number_format($tong) ?><sup>đ</sup></td>
                </tfoot>
                </thead>
            </table>
            <div class="btn-cart">
                <a href="?ctrl=page&view=home"><button class="btn-continue">TIẾP TỤC MUA SẮM</button></a>
            </div>
        </div>
    </div>
    <script src="public\js\jquery-3.7.1.min.js">
    </script>

    <script>
        $.ajax({
            type: "method",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function(response) {

            }
        });
    </script>
</div>