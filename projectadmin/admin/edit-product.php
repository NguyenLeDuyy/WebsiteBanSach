<?php
require_once './config/database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID sản phẩm không hợp lệ.";
    exit;
}

$query = 'SELECT * FROM books WHERE id = :id';
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $discounted_price = $_POST['discounted_price'] ?? null;
    $published_date = $_POST['published_date'];
    $cover_image = $_POST['cover_image'] ?? $book['cover_image']; // Thay thế bằng code upload file nếu có

    $updateQuery = 'UPDATE books SET title = :title, author = :author, price = :price, discounted_price = :discounted_price, published_date = :published_date, cover_image = :cover_image WHERE id = :id';
    $updateStmt = $db->prepare($updateQuery);
    $updateStmt->bindParam(':title', $title);
    $updateStmt->bindParam(':author', $author);
    $updateStmt->bindParam(':price', $price);
    $updateStmt->bindParam(':discounted_price', $discounted_price);
    $updateStmt->bindParam(':published_date', $published_date);
    $updateStmt->bindParam(':cover_image', $cover_image);
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        echo "Sản phẩm đã được cập nhật thành công.";
    } else {
        echo "Có lỗi xảy ra khi cập nhật sản phẩm.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <h1>Sửa Sản Phẩm</h1>
    <form method="POST">
        <label for="title">Tên Sản Phẩm:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($book['title']); ?>" required><br>

        <label for="author">Tác Giả:</label>
        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($book['author']); ?>" required><br>

        <label for="price">Giá:</label>
        <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($book['price']); ?>" required><br>

        <label for="discounted_price">Giá Khuyến Mãi:</label>
        <input type="number" name="discounted_price" id="discounted_price" value="<?php echo htmlspecialchars($book['discounted_price']); ?>"><br>

        <label for="published_date">Ngày Xuất Bản:</label>
        <input type="date" name="published_date" id="published_date" value="<?php echo htmlspecialchars($book['published_date']); ?>" required><br>

        <label for="cover_image">Ảnh Bìa:</label>
        <input type="text" name="cover_image" id="cover_image" value="<?php echo htmlspecialchars($book['cover_image']); ?>"><br>

        <button type="submit">Lưu</button>
    </form>
</body>
</html>
<style>
/* Định dạng cho phần tử form */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

/* Định dạng cho các nhãn */
label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

/* Định dạng cho các trường nhập */
input[type="text"],
input[type="number"],
input[type="date"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Định dạng cho nút bấm */
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #45a049;
}

</style>