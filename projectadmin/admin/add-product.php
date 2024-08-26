<?php
// Include database connection
require_once './config/database.php';



// Khởi tạo biến để lưu thông báo
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $discounted_price = $_POST['discounted_price'] ?? null;
    $published_date = $_POST['published_date'];
    $description = $_POST['description'] ?? null;
    $discount_percentage = $_POST['discount_percentage'] ?? null;
    $category_id = $_POST['category_id'];
    $cover_image = '';
    $image_urls = '';

    // Handle cover image upload
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
        if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file)) {
            $cover_image = basename($_FILES["cover_image"]["name"]);
        } else {
            $message = "Sorry, there was an error uploading your cover image.";
        }
    }

    // Handle additional images upload
    if (isset($_FILES['image_urls']) && !empty($_FILES['image_urls']['name'][0])) {
        $image_urls_array = [];
        foreach ($_FILES['image_urls']['name'] as $key => $name) {
            $target_file = $target_dir . basename($name);
            if (move_uploaded_file($_FILES["image_urls"]["tmp_name"][$key], $target_file)) {
                $image_urls_array[] = basename($name);
            } else {
                $message = "Sorry, there was an error uploading file $name.";
            }
        }
        $image_urls = json_encode($image_urls_array);
    } else {
        $image_urls = json_encode([]); // Set as empty array if no images uploaded
    }

    // Insert into database
    $query = "INSERT INTO books (title, author, price, discounted_price, published_date, description, cover_image, image_urls, discount_percentage, category_id) 
              VALUES (:title, :author, :price, :discounted_price, :published_date, :description, :cover_image, :image_urls, :discount_percentage, :category_id)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':discounted_price', $discounted_price);
    $stmt->bindParam(':published_date', $published_date);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':cover_image', $cover_image);
    $stmt->bindParam(':image_urls', $image_urls);
    $stmt->bindParam(':discount_percentage', $discount_percentage);
    $stmt->bindParam(':category_id', $category_id);

    try {
        if ($stmt->execute()) {
            $message = "Sản phẩm đã được thêm thành công.";
        } else {
            $message = "Error: Unable to add product.";
        }
    } catch (PDOException $e) {
        $message = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="main-content">
        <div class="main-content__header">
            <h1>Thêm Sản Phẩm Mới</h1>
        </div>
        <div class="main-content__content">
            <form action="add-product.php" method="post" enctype="multipart/form-data">
                <label for="title">Tên Sản Phẩm:</label>
                <input type="text" id="title" name="title" required><br><br>

                <label for="author">Tác Giả:</label>
                <input type="text" id="author" name="author" required><br><br>

                <label for="price">Giá:</label>
                <input type="number" id="price" name="price" required><br><br>

                <label for="discounted_price">Giá Khuyến Mãi:</label>
                <input type="number" id="discounted_price" name="discounted_price"><br><br>

                <label for="published_date">Ngày Xuất Bản:</label>
                <input type="date" id="published_date" name="published_date" required><br><br>

                <label for="description">Mô Tả:</label>
                <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

                <label for="discount_percentage">Phần Trăm Khuyến Mãi:</label>
                <input type="number" id="discount_percentage" name="discount_percentage"><br><br>

                <label for="category_id">Mã Danh Mục:</label>
                <input type="number" id="category_id" name="category_id" required><br><br>

                <label for="cover_image">Ảnh Bìa:</label>
                <input type="file" id="cover_image" name="cover_image"><br><br>

                <label for="image_urls">Ảnh Sản Phẩm Khác (có thể chọn nhiều ảnh):</label>
                <input type="file" id="image_urls" name="image_urls[]" multiple><br><br>

                <input type="submit" value="Thêm Sản Phẩm">
            </form>

            <?php if (!empty($message)): ?>
                <script>
                    alert('<?php echo htmlspecialchars($message); ?>');
                </script>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
