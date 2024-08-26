<div class="main-content__header">
    <h1>Người Dùng</h1>
</div>
<div class="main-content__content">
    <p>Danh sách người dùng sẽ được hiển thị ở đây.</p>
    <!-- Trigger/Open The Modal -->
    <div class="btn-modal">
        <button id="addNewUserBtn">Thêm người dùng mới</button>
    </div>
    <table class="users-table">
        <thead>
            <tr class="users-table__header">
                <th class="users-table__cell users-table__cell--header">ID</th>
                <th class="users-table__cell users-table__cell--header">Tên Người Dùng</th>
                <th class="users-table__cell users-table__cell--header">Email</th>
                <th class="users-table__cell users-table__cell--header">Quyền Hạn</th>
                <th class="users-table__cell users-table__cell--header">Ẩn/Hiện</th>
                <th class="users-table__cell users-table__cell--header">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($listUser as $user) : ?>
                <tr class="users-table__row">
                    <td class="users-table__cell"><?= $i++ ?></td>
                    <td class="users-table__cell"><?= $user['fullname'] ?></td>
                    <td class="users-table__cell"><?= $user['email'] ?></td>
                    <td class="users-table__cell">
                        <?= $user['role'] == 'user' ? "Người dùng" : "Quản trị viên"  ?>
                    </td>
                    <td class="users-table__cell">
                        <?= $user['AnHien'] == '1' ? "Hiện" : "Ẩn"  ?>
                    </td>
                    <td class="users-table__cell users-table__cell--actions">
                        <a href="?ctrl=user&view=userUpdateAdmin&id=<?= $user['id'] ?>" class="users-table__button">Sửa</a>
                        <a href="?ctrl=user&view=userShowHideAdmin&id=<?= $user['id'] ?>""
                                    class=" users-table__button
                            users-table__button--showHide"><?= $user['AnHien'] == '1' ? "Ẩn" : "Hiện"  ?></a>
                        <a href="?ctrl=user&view=userShowHideAdmin&id=<?= $user['id'] ?><?= $user['id'] ?>"
                            class="users-table__button users-table__button--delete"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</body>

</html>