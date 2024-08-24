<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

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
                        <th class="orders-table__cell orders-table__cell--header">Tình Trạng</th>
                        <th class="orders-table__cell orders-table__cell--header">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="orders-table__row">
                        <td class="orders-table__cell">001</td>
                        <td class="orders-table__cell">Nguyễn Văn A</td>
                        <td class="orders-table__cell ">
                            <form method="post" action="update_order_status.php" class="orders-table__form">
                                <input type="hidden" name="order_id" value="001">
                                <select name="status" class="orders-table__select">
                                    <option value="chưa thanh toán" selected>Chưa thanh toán</option>
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
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
