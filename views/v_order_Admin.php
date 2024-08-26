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
                <th class="orders-table__cell orders-table__cell--header">Thanh toán</th>
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
                        <form method="post" action="?ctrl=order&view=updateStatus" class="orders-table__form">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <select name="status" class="orders-table__select">
                                <option value="Pending" <?php if (($order['status']) == 'Pending') echo "selected" ?>>Đang
                                    chờ xử lý
                                </option>
                                <option value="Processing" <?php if (($order['status']) == 'Processing') echo "selected" ?>>
                                    Đang xử lý
                                </option>
                                <option value="Delivered" <?php if (($order['status']) == 'Delivered') echo "selected" ?>>Đã
                                    giao hàng
                                </option>
                            </select>
                            <button type="submit" class="orders-table__button">Cập nhật</button>
                        </form>
                    </td>
                    <td class="orders-table__cell"><?= $order['payment_status'] ?></td>
                    <td class="orders-table__cell"><a
                            href="?ctrl=order&view=orderDetailAdmin&id=<?= $order['id'] ?>"><button type="submit"
                                class="orders-table__button">Xem
                                chi tiết</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</body>

</html>