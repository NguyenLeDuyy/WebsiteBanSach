<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Người Dùng</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="main-content">
        <div class="main-content__header">
            <h1>Người Dùng</h1>
        </div>
        <div class="main-content__content">
            <p>Danh sách người dùng sẽ được hiển thị ở đây.</p>
            <p><a href="add-user.php" class="main-content__link">Thêm người dùng mới</a></p>
            <table class="users-table">
                <thead>
                    <tr class="users-table__header">
                        <th class="users-table__cell users-table__cell--header">ID</th>
                        <th class="users-table__cell users-table__cell--header">Tên Người Dùng</th>
                        <th class="users-table__cell users-table__cell--header">Email</th>
                        <th class="users-table__cell users-table__cell--header">Quyền Hạn</th>
                        <th class="users-table__cell users-table__cell--header">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="users-table__row">
                        <td class="users-table__cell">001</td>
                        <td class="users-table__cell">Nguyễn Văn A</td>
                        <td class="users-table__cell">nguyenvana@example.com</td>
                        <td class="users-table__cell">Quản trị viên</td>
                        <td class="users-table__cell users-table__cell--actions">
                            <a href="edit-user.php?id=001" class="users-table__button">Sửa</a>
                            <a href="delete-user.php?id=001" class="users-table__button users-table__button--delete">Xóa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
