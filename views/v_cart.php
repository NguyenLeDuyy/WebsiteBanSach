<div class="base-container-for-cart">
    <h1 class="title">Giỏ hàng</h1>
    <div class="cart-container">
        <table class="cart-table" border="1" style="width:100%">
            <h3 class="cart-hello">Giỏ hàng xin chào: <span><?= $_SESSION['user']['fullname'] ?></span></h3>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            <tbody>
                <?php
                $tong = 0;
                $i = 1;
                foreach ($_SESSION['cart'] as $sp) : ?>
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
                            <a class="quantity-button"
                                href="?ctrl=cart&view=subQuantity&index=<?= $i - 2 ?>&id=<?= $sp['product_id'] ?>">-</a>
                            <?= $sp['quantity'] ?>
                            <a class="quantity-button"
                                href="?ctrl=cart&view=plusQuantity&index=<?= $i - 2 ?>&id=<?= $sp['product_id'] ?>">+</a>
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
                        <td>
                            <a href="?ctrl=cart&view=removeFromCart&index=<?= $i - 2 ?>&id=<?= $sp['product_id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                ?>
            </tbody>
            <tfoot>
                <td colspan="5">Tổng cộng</td>
                <td><?= number_format($tong) ?><sup>đ</sup></td>
                <td>
                    <a href="?ctrl=cart&view=removeAllFromCart">Xóa hết</a>
                </td>
            </tfoot>
            </thead>
        </table>
        <div class="btn-cart">
            <a href="?ctrl=page&view=home"><button class="btn-continue">TIẾP TỤC MUA SẮM</button></a>
            <a href="?ctrl=cart&view=delivery_address"><button class="btn-order">ĐẶT HÀNG</button></a>
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