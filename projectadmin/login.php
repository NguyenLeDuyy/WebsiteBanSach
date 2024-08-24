<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login-container">
        <h1>Đăng Nhập</h1>
        <form action="login_process.php" method="POST">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Đăng Nhập</button>
        </form>
    </div>
</body>

</html>
