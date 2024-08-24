<body class="page">
    <div class="main-content">
        <div class="main-content__header">
            <h1>Quản Lý Đơn Hàng</h1>
        </div>
        <div class="main-content__content">
            <h2>Danh sách đơn hàng</h2>
            <table class="orders-table">
                <thead>
                    <tr class="orders-table__header">
                        <th class="orders-table__cell orders-table__cell--header">ID Đơn Hàng</th>
                        <th class="orders-table__cell orders-table__cell--header">Khách Hàng</th>
                        <th class="orders-table__cell orders-table__cell--header">Tổng tiền</th>
                        <th class="orders-table__cell orders-table__cell--header">Tình Trạng</th>
                        <th class="orders-table__cell orders-table__cell--header">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listOrders as $order) : ?>
                        <tr class="orders-table__row">
                            <td class="orders-table__cell"><?= $order['id'] ?></td>
                            <td class="orders-table__cell"><?= $order['fullname'] ?></td>
                            <td class="orders-table__cell"><?= number_format($order['total_amount']) ?> VNĐ</td>
                            <td class="orders-table__cell ">
                                <form method="post" action="update_order_status.php" class="orders-table__form">
                                    <input type="hidden" name="order_id" value="001">
                                    <select name="status" class="orders-table__select">
                                        <option value="chưa thanh toán"
                                            <?php if (($order['status']) == 'Processing') echo "Đang xử lý" ?>>
                                            Đang xử lý</option>
                                        <option value="đang giao hàng">Đang giao hàng</option>
                                        <option value="đã thanh toán">Đã thanh toán</option>
                                    </select>
                                </form>
                            </td>
                            <td class="orders-table__cell ">
                                <form method="post" action="update_order_status.php">
                                    <input type="hidden" name="order_id" value="001">
                                    <button type="submit" class="orders-table__button">Cập nhật</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>