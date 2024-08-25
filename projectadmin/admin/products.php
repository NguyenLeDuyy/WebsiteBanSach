<?php
// include database connection
require_once './config/database.php';



// Query to get all books
$query = 'SELECT * FROM books';
$stmt = $db->query($query);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="main-content">
        <div class="main-content__header">
            <h1>Quản Lý Sản Phẩm</h1>
        </div>
        <div class="main-content__content">
            <p>Danh sách sản phẩm sẽ được hiển thị ở đây.</p>
            <p><a href="?controller=add-product" class="main-content__link">Thêm sản phẩm mới</a></p>
            <table class="products-table">
                <thead>
                    <tr class="products-table__header">
                        <th class="products-table__cell products-table__cell--header">ID</th>
                        <th class="products-table__cell products-table__cell--header">Tên Sản Phẩm</th>
                        <th class="products-table__cell products-table__cell--header">Tác Giả</th>
                        <th class="products-table__cell products-table__cell--header">Giá</th>
                        <th class="products-table__cell products-table__cell--header">Giá Khuyến Mãi</th>
                        <th class="products-table__cell products-table__cell--header">Ngày Xuất Bản</th>
                        <th class="products-table__cell products-table__cell--header">Ảnh Bìa</th>
                        <th class="products-table__cell products-table__cell--header">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                        <tr class="products-table__row">
                            <td class="products-table__cell"><?php echo htmlspecialchars($book['id']); ?></td>
                            <td class="products-table__cell"><?php echo htmlspecialchars($book['title']); ?></td>
                            <td class="products-table__cell"><?php echo htmlspecialchars($book['author']); ?></td>
                            <td class="products-table__cell"><?php echo number_format($book['price'], 0, ',', '.'); ?> VNĐ</td>
                            <td class="products-table__cell"><?php echo $book['discounted_price'] ? number_format($book['discounted_price'], 0, ',', '.') . ' VNĐ' : 'Không có'; ?></td>
                            <td class="products-table__cell"><?php echo htmlspecialchars($book['published_date']); ?></td>
                            <td class="products-table__cell">
                                <?php if ($book['cover_image']): ?>
                                    <img src="../uploads/<?php echo htmlspecialchars($book['cover_image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" width="100">
                                <?php else: ?>
                                    Chưa có ảnh
                                <?php endif; ?>
                            </td>
                            <td class="products-table__cell products-table__cell--actions">
                            <a href="?controller=edit-product&id=<?php echo htmlspecialchars($book['id']); ?>" class="products-table__button">Sửa</a>
                            <a href="admin/delete-product.php?id=<?php echo htmlspecialchars($book['id']); ?>" class="products-table__button products-table__button--delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
