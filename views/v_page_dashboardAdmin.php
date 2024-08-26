<div class="main-content__header">
    <h1 class="title">Tổng Quan</h1>
</div>
<div class="main-content__content">
    <section class="overview-section">
        <h2 class="title">Thông Tin Tổng Quan</h2>
        <div class="overview-cards">
            <div class="overview-card">
                <h3 class="title">Số Đơn Hàng</h3>
                <p><?= $total_orders; ?></p>
            </div>
            <div class="overview-card">
                <h3 class="title">Số Sản Phẩm</h3>
                <p><?= $total_products; ?></p>
            </div>
            <div class="overview-card">
                <h3 class="title">Doanh Thu</h3>
                <p><?= number_format($total_amount); ?> VNĐ</p>
            </div>
            <div class="overview-card">
                <h3 class="title">Người Dùng</h3>
                <p><?= $total_users; ?></p>
            </div>
        </div>
    </section>
    <section class="latest-orders">
        <h2 class="title">Đơn Hàng Mới Nhất</h2>
        <table class="orders-table">
            <thead>
                <tr class="orders-table__header">
                    <th class="orders-table__cell orders-table__cell--header">ID Đơn Hàng</th>
                    <th class="orders-table__cell orders-table__cell--header">Khách Hàng</th>
                    <th class="orders-table__cell orders-table__cell--header">Tổng tiền</th>
                    <th class="orders-table__cell orders-table__cell--header">Tình Trạng</th>
                    <th class="orders-table__cell orders-table__cell--header">Thanh toán</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listOrders as $order) : ?>
                <tr class="orders-table__row">
                    <td class="orders-table__cell"><?= $order['id'] ?></td>
                    <td class="orders-table__cell"><?= $order['fullname'] ?></td>
                    <td class="orders-table__cell"><?= number_format($order['total_amount']) ?> VNĐ</td>
                    <td class="orders-table__cell">
                        <?= (($order['status']) == 'Processing') ? "Đang xử lý" : ((($order['status']) == 'Pending') ? "Đang chờ xử lý" : "Đang giao hàng") ?>
                    </td>
                    <td class="orders-table__cell"><?= $order['payment_status'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
</div>
</body>

</html>