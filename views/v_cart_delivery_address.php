<div class="base-container-for-cart">
    <h1>Địa chỉ giao hàng</h1>
    <div class="delivery-row">
        <div class="left-delivery">
            <form class="delivery-form" action="?ctrl=cart&view=payment" method="POST">
                <p class="form-title">Thông tin người nhận</p>
                <div class="form-group">
                    <label for="name">Tên người nhận<sup>*</sup></label>
                    <br>
                    <input class="form-control" type="text" id="name" name="name" required value="<?= $_SESSION['user']['fullname'] ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Điện thoại<sup>*</sup></label>
                    <br>
                    <input class="form-control" type="text" id="phone" name="phone" required value="<?= $_SESSION['user']['phone'] ?>">
                </div>

                <div class="form-group">
                    <label for="city">Tỉnh/Tp<sup>*</sup></label>
                    <br>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">Chọn tỉnh/tp</option>
                        <!-- Add more options for provinces -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="district">Quận/Huyện<sup>*</sup></label>
                    <br>
                    <select class="form-control" id="district" name="district" required>
                        <option value="">Chọn quận/huyện</option>
                        <!-- Add more options for districts -->
                    </select>
                </div>

                <div class="form-group" id="commnue-box">
                    <label for="ward">Phường/Xã<sup>*</sup></label>
                    <br>
                    <select class="form-control" id="ward" name="ward" required>
                        <option value="">Chọn phường/xã</option>
                        <!-- Add more options for wards -->
                    </select>
                </div>

                <div class="form-group" id="address-box">
                    <label for="address">Địa chỉ<sup>*</sup></label>
                    <br>
                    <input class="form-control" type="text" id="address" name="address" required value="<?= $_SESSION['user']['address'] ?>">
                </div>

                <!-- <div class="form-group">
                    <label for="payment_method">Phương thức thanh toán<sup>*</sup></label>
                    <br>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="credit_card">Thẻ tín dụng</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div> -->

                <div class="form-group"></div>

                <div class="form-group">
                    <a href="?ctrl=cart&view=view" class="cart-comeback">
                        <p>
                            <<< Quay lại giỏ hàng</p>
                    </a>
                </div>

                <div class="form-group button-delivery">
                    <!-- /* sử dụng thêm class btn-order để giống trang cart */ -->
                    <button class="btn-order type=" submit">Thanh toán và giao hàng</button>
                </div>
            </form>
        </div>
        <div class="right-delivery">
            <table class="delivery-table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tong = 0;
                    foreach ($cartItems as $sp) : ?>
                        <tr>
                            <td><?php echo $sp['product_title']; ?></td>
                            <td><?php echo $sp['quantity']; ?></td>
                            <?php if (isset($sp['discounted_price'])) : ?>
                                <td>
                                    <strong><?= number_format($sp['discounted_price']) ?><sup>đ</sup></strong>
                                    <del><?= number_format($sp['price']) ?><sup>đ</sup></del>
                                </td>
                            <?php else : ?>
                                <td><?= number_format($sp['price']) ?><sup>đ</sup></td>
                            <?php endif; ?>
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
                    <tr>
                        <td colspan="3">Tạm tính</td>
                        <td><?= number_format($tong) ?><sup>đ</sup></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="views/city_district_ward.js"></script>
    <script src="views/city_district_ward.js"></script>
</div>
<!-- <script>
console.log("Hello World");
</script> -->