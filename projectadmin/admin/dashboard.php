<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng Quan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="main-content">
        <div class="main-content__header">
            <h1>Tổng Quan</h1>
        </div>
        <div class="main-content__content">
            <section class="overview-section">
                <h2>Thông Tin Tổng Quan</h2>
                <div class="overview-cards">
                    <div class="overview-card">
                        <h3>Số Đơn Hàng</h3>
                        <p>120</p>
                    </div>
                    <div class="overview-card">
                        <h3>Số Sản Phẩm</h3>
                        <p>75</p>
                    </div>
                    <div class="overview-card">
                        <h3>Doanh Thu</h3>
                        <p>1,500,000 VNĐ</p>
                    </div>
                    <div class="overview-card">
                        <h3>Người Dùng</h3>
                        <p>250</p>
                    </div>
                </div>
            </section>
            <section class="latest-orders">
                <h2>Đơn Hàng Mới Nhất</h2>
                <table class="orders-table">
                    <thead>
                        <tr class="orders-table__header">
                            <th class="orders-table__cell orders-table__cell--header">ID Đơn Hàng</th>
                            <th class="orders-table__cell orders-table__cell--header">Khách Hàng</th>
                            <th class="orders-table__cell orders-table__cell--header">Tình Trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="orders-table__row">
                            <td class="orders-table__cell">001</td>
                            <td class="orders-table__cell">Nguyễn Văn A</td>
                            <td class="orders-table__cell">Đang giao hàng</td>
                        </tr>
                        <tr class="orders-table__row">
                            <td class="orders-table__cell">002</td>
                            <td class="orders-table__cell">Trần Thị B</td>
                            <td class="orders-table__cell">Chưa thanh toán</td>
                        </tr>
                        <tr class="orders-table__row">
                            <td class="orders-table__cell">003</td>
                            <td class="orders-table__cell">Lê Văn C</td>
                            <td class="orders-table__cell">Đã thanh toán</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>

</html>
