<div class="container">
    <h1>Thanh toán đơn hàng</h1>
    <div class="payment-row">
        <div class="left-payment">
            <form class="payment-form" action="">
                <div class="form-group">
                    <h3>Phương thức giao hàng</h3>
                    <p>Chuyển hàng tới địa chỉ khác hàng</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="delivery-express" name="delivery_method"
                            value="express" checked>
                        <label class="form-check-label" for="delivery-express">Giao hàng chuyển phát nhanh</label>
                    </div>
                </div>

                <br>

                <div class="form-group form-group-payment">
                    <h3>Phương thức thanh toán</h3>
                    <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.
                    </p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="payment-credit" name="payment_method"
                            value="credit" checked>
                        <div class="bank-line">
                            <label class="form-check-label" for="payment-credit">Thanh toán bằng thẻ tín dụng
                                (OnePay)</label>
                            <img class="visa" src="public/img/bank/Visa-Mastercard-1-1536x566.png" alt="">
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="payment-atm" name="payment_method" value="atm">
                        <div class="bank-line">
                            <label class="form-check-label" for="payment-atm">Thanh toán bằng thẻ ATM (OnePay)</label>
                            <img class="bank" src="public/img/bank/Logo-Vietcombank-Sl.webp" alt="">
                            <img class="bank" src="public/img/bank/Logo-VietinBank-CTG-Te.webp" alt="">
                            <img class="bank" src="public/img/bank/Logo-MB-Bank-MBB.webp" alt="">
                            <img class="bank" src="public/img/bank/Logo-TCB-V.webp" alt="">
                            <img class="bank" src="public/img/bank/Logo-TPBank-Sl.webp" alt="">
                            <img class="bank" src="public/img/bank/Logo-VPBank.webp" alt="">
                            <img class="bank" src="public/img/bank/Logo-Agribank-H.webp" alt="">
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="payment-momo" name="payment_method"
                            value="momo">
                        <div class="bank-line">
                            <label class="form-check-label" for="payment-momo">Thanh toán Momo</label>
                            <img class="momo" src="public/img/bank/Logo-MoMo-Transparent.webp" alt="">
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="payment-cod" name="payment_method" value="cod">
                        <div class="bank-line">
                            <label class="form-check-label" for="payment-cod">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="btn-payment">
                    <a href="?ctrl=cart&view=delivery_address" class="cart-comeback">
                        <p>
                            <<< Quay lại địa chỉ giao hàng</p>
                    </a>
                    <button type="submit" class="btn-order btn-finish" onclick="alert('Đã đặt hàng thành công!')">Hoàn
                        tất</button>
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
                    <tr>
                        <td colspan="3">Giao hàng chuyển phát nhanh - Chuyển phát nhanh</td>
                        <td>30,000<sup>đ</sup></td>
                    </tr>
                    <tr>
                        <td colspan="3">Tiền cần thanh toán</td>
                        <td><?= number_format($tong + 30000) ?><sup>đ</sup></td>
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