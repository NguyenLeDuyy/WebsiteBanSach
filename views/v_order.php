<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="base-container-for-cart ">
        <div class="cart-container">
            <h1 class="title cart-hello">Danh sách đơn hàng</h1>

            <table border="1" style="width:100%" class="cart-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1;
                    foreach ($_SESSION['order'] as $order) : ?>
                        <tr>
                            <td><?= $index ?></td>
                            <td><?= $order['order_date'] ?></td>
                            <td><?= number_format($order['total_amount']) ?><sup>đ</sup></td>
                            <td>
                                <?php if ($order['payment_method'] == 'credit') : ?>
                                    Thanh toán bằng thẻ tín dụng (OnePay)
                                <?php elseif ($order['payment_method'] == 'atm') : ?>
                                    Thanh toán bằng thẻ ATM (OnePay)
                                <?php elseif ($order['payment_method'] == 'momo') : ?>
                                    Thanh toán Momo
                                <?php elseif ($order['payment_method'] == 'cod') : ?>
                                    Thanh toán khi nhận hàng
                                <?php else : ?>
                                    Phương thức thanh toán không xác định
                                <?php endif; ?>
                            </td>
                            <?php if ($order['status'] == 'Pending') : ?>
                                <td>Đang chờ xử lý</td>
                            <?php elseif ($order['status'] == 'Processing') : ?>
                                <td>Đang xử lý</td>
                            <?php elseif ($order['status'] == 'Delivered') : ?>
                                <td>Đã giao cho đơn vị vận chuyển</td>
                            <?php elseif ($order['status'] == 'Finish') : ?>
                                <td>Đã giao</td>
                            <?php else : ?>
                                <td>Đã hủy</td>
                            <?php endif; ?>
                        </tr>
                    <?php $index++;
                    endforeach; ?>
                </tbody>
            </table>
            <div class="btn-cart">
                <a href="?ctrl=page&view=home"><button class="btn-continue">TIẾP TỤC MUA SẮM</button></a>
            </div>
        </div>
    </div>
</body>

</html>