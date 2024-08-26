<h1 class="title">Chỉnh sửa sản phẩm</h1>
<hr>
<form action="?ctrl=product&view=updateProductFromAdminHanlde&id=<?= $book['id'] ?>" method="POST" class="updateForm"
    enctype="multipart/form-data">
    <div class="modal-body">
        <label for="title">Tên sản phẩm:</label>
        <input type="text" id="title" name="title" value="<?= $book['title'] ?>" required>

        <label for="author">Tác giả:</label>
        <input type="text" id="author" name="author" value="<?= $book['author'] ?>" required>

        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" value="<?= $book['price'] ?>" required>

        <label for="discount_percentage">Phần trăm khuyến mãi:</label>
        <input type="number" id="discount_percentage" name="discount_percentage" onchange="updateDiscountedPrice()"
            value="<?= $book['discount_percentage'] ?>">

        <label for="discounted_price">Giá khuyến mãi:</label>
        <input type="number" id="discounted_price" name="discounted_price" value="<?= $book['discounted_price'] ?>"
            readonly>

        <label for="published_date">Ngày Xuất Bản:</label>
        <input type="date" id="published_date" name="published_date" value="<?= $book['published_date'] ?>" required>

        <label for="description">Mô Tả:</label>
        <textarea id="description" name="description" rows="4" cols="50" value=""><?= $book['description'] ?></textarea>

        <label for="category_id">Danh Mục:</label>
        <select name="category_id" class="orders-table__select" required>
            <option>Chọn danh mục</option>
            <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"
                <?php if (($book['category_id']) == $category['id']) echo "selected" ?>>
                <?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="status">Trạng thái:</label>
        <select name="status" class="orders-table__select" id="status" required>
            <option value="Còn hàng" <?php if (($book['status']) == 'Còn hàng') echo "selected" ?>>
                Còn hàng</option>
            <option value="Hết hàng" <?php if (($book['status']) == 'Hết hàng') echo "selected" ?>>
                Hết hàng</option>
        </select>

        <label for="cover_image">Ảnh Bìa:</label>
        <input type="file" id="cover_image" name="cover_image" value="<?= $book['cover_image'] ?>">

    </div>
    <div class="btn-sumbit-new-user">
        <button type="submit">Cập nhật sản phẩm</button>
    </div>
</form>
</body>

<script>
function updateDiscountedPrice() {
    var originalPrice = parseFloat(document.getElementById('price').value) || 0;
    var discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;
    var discountedPrice = originalPrice - (originalPrice * (discountPercentage / 100));
    document.getElementById('discounted_price').value = discountedPrice.toFixed(2);
}
</script>