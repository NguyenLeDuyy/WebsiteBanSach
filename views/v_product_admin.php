<div class="main-content__header">
    <h1 class="title">Quản Lý Sản Phẩm</h1>
</div>
<div class="main-content__content">
    <p>Danh sách sản phẩm sẽ được hiển thị ở đây.</p>
    <div class="btn-modal">
        <button id="addNewProductBtn">Thêm sản phẩm mới</button>
    </div>
    <table class="products-table">
        <thead>
            <tr class="products-table__header">
                <th class="products-table__cell products-table__cell--header">ID</th>
                <th class="products-table__cell products-table__cell--header">Tên sản phẩm</th>
                <th class="products-table__cell products-table__cell--header">Tác giả</th>
                <th class="products-table__cell products-table__cell--header">Giá</th>
                <th class="products-table__cell products-table__cell--header">Giá khuyến mãi</th>
                <th class="products-table__cell products-table__cell--header">Trạng thái</th>
                <th class="products-table__cell products-table__cell--header">Ẩn/Hiện</th>
                <th class="products-table__cell products-table__cell--header">Ảnh bìa</th>
                <th class="products-table__cell products-table__cell--header">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dsSP as $book): ?>
            <tr class="products-table__row">
                <td class="products-table__cell"><?= htmlspecialchars($book['id']); ?></td>
                <td class="products-table__cell"><?= htmlspecialchars($book['title']); ?></td>
                <td class="products-table__cell"><?= htmlspecialchars($book['author']); ?></td>
                <td class="products-table__cell"><?= number_format($book['price'], 0, ',', '.'); ?> VNĐ
                </td>
                <td class="products-table__cell">
                    <?= $book['discounted_price'] ? number_format($book['discounted_price'], 0, ',', '.') . ' VNĐ' : 'Không có'; ?>
                </td>
                <td>
                    <form method="post" action="?ctrl=product&view=updateStatus" class="orders-table__form">
                        <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                        <select name="status" class="orders-table__select">
                            <option value="Còn hàng" <?php if (($book['status']) == 'Còn hàng') echo "selected" ?>>Còn
                                hàng
                            </option>
                            <option value="Hết hàng" <?php if (($book['status']) == 'Hết hàng') echo "selected" ?>>Hết
                                hàng
                            </option>
                        </select>
                        <button type="submit" class="orders-table__button">Cập nhật</button>
                    </form>
                </td>
                <td class="users-table__cell">
                    <?= $book['AnHien'] == '1' ? "Hiện" : "Ẩn"  ?>
                </td>
                <td class="products-table__cell">
                    <?php if ($book['cover_image']): ?>
                    <img src="public\img\All\<?= htmlspecialchars($book['cover_image']); ?>"
                        alt="<?= htmlspecialchars($book['title']); ?>" width="100">
                    <?php else: ?>
                    Chưa có ảnh
                    <?php endif; ?>
                </td>
                <td class="products-table__cell products-table__cell--actions">
                    <a href="?ctrl=product&view=productUpdateAdmin&id=<?= htmlspecialchars($book['id']); ?>"
                        class="products-table__button">Sửa</a>
                    <a href="?ctrl=product&view=productShowHideAdmin&id=<?= $book['id'] ?>""
                                    class=" users-table__button
                        users-table__button--showHide"><?= $book['AnHien'] == '1' ? "Ẩn" : "Hiện"  ?></a>
                    <a href="?ctrl=product&view=productShowHideAdmin&id=<?= htmlspecialchars($book['id']); ?>"
                        class="products-table__button products-table__button--delete"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</body>