<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="main-content">
        <div class="main-content__header">
            <h1>Quản Lý Sản Phẩm</h1>
        </div>
        <div class="main-content__content">
            <p>Danh sách sản phẩm sẽ được hiển thị ở đây.</p>
            <p><a href="add-product.php" class="main-content__link">Thêm sản phẩm mới</a></p>
            <table class="products-table">
                <thead>
                    <tr class="products-table__header">
                        <th class="products-table__cell products-table__cell--header">ID</th>
                        <th class="products-table__cell products-table__cell--header">Tên Sản Phẩm</th>
                        <th class="products-table__cell products-table__cell--header">Số Lượng</th>
                        <th class="products-table__cell products-table__cell--header">Giá</th>
                        <th class="products-table__cell products-table__cell--header">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="products-table__row">
                        <td class="products-table__cell">001</td>
                        <td class="products-table__cell">Sản phẩm A</td>
                        <td class="products-table__cell">10</td>
                        <td class="products-table__cell">100.000 VNĐ</td>
                        <td class="products-table__cell products-table__cell--actions">
                            <a href="edit-product.php?id=001" class="products-table__button">Sửa</a>
                            <a href="delete-product.php?id=001"
                                class="products-table__button products-table__button--delete">Xóa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>