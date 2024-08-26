<!-- The Modal -->
<div id="addProductModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Thêm sản phẩm mới</h2>
        </div>
        <form action="?ctrl=product&view=addProductFromAdmin" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="title">Tên sản phẩm:</label>
                <input type="text" id="title" name="title" required>

                <label for="author">Tác giả:</label>
                <input type="text" id="author" name="author" required>

                <label for="price">Giá:</label>
                <input type="number" id="price" name="price" required>

                <label for="discount_percentage">Phần trăm khuyến mãi:</label>
                <input type="number" id="discount_percentage" name="discount_percentage"
                    onchange="updateDiscountedPrice()">

                <label for="discounted_price">Giá khuyến mãi:</label>
                <input type="number" id="discounted_price" name="discounted_price" readonly>

                <label for="published_date">Ngày Xuất Bản:</label>
                <input type="date" id="published_date" name="published_date" required>

                <label for="description">Mô Tả:</label>
                <textarea id="description" name="description" rows="4" cols="50"></textarea>

                <label for="category_id">Danh Mục:</label>
                <select name="category_id" class="orders-table__select" required>
                    <option>Chọn danh mục</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="cover_image">Ảnh Bìa:</label>
                <input type="file" id="cover_image" name="cover_image">

            </div>
            <div class="btn-sumbit-new-user">
                <button type="submit">Thêm sản phẩm</button>
            </div>
        </form>

    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("addProductModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addNewProductBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script>
    function updateDiscountedPrice() {
        var originalPrice = parseFloat(document.getElementById('price').value) || 0;
        var discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;
        var discountedPrice = originalPrice - (originalPrice * (discountPercentage / 100));
        document.getElementById('discounted_price').value = discountedPrice.toFixed(2);
    }
</script>