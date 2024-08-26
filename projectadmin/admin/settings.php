<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài Đặt</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="main-content">
        
        <div class="content">
            <h2>Cài Đặt Tài Khoản</h2>
            <form action="/update-settings" method="post">
                <fieldset>
                    <legend>Thông Tin Cá Nhân</legend>
                    <label for="username">Tên Người Dùng:</label>
                    <input type="text" id="username" name="username" value="Admin" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="admin@example.com" required>
                </fieldset>
                
                <fieldset>
                    <legend>Mật Khẩu</legend>
                    <label for="password">Mật Khẩu Mới:</label>
                    <input type="password" id="password" name="password">
                    <p class="note">Để trống nếu không thay đổi mật khẩu.</p>
                </fieldset>
                
                <button type="submit" class="update-button">Cập Nhật</button>
            </form>
        </div>
    </div>
</body>

</html>
