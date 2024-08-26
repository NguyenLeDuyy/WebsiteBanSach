<body>
    <div class="main-content">
        <h2 class="title">Cập nhật người dùng</h2>
        <form action="?ctrl=user&view=userUpdateAdminHandle&id=<?= $user['id'] ?>" class="updateForm" method="POST">
            <div class="modal-body">
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" value="<?= $user['fullname'] ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>

                <label for="role">Quyền hạn:</label>
                <select id="role" name="role">
                    <option value="user" <?php if (($user['role']) == 'user') echo "selected" ?>>Người dùng
                    </option>
                    <option value="admin" <?php if (($user['role']) == 'admin') echo "selected" ?>>Quản trị viên
                    </option>
                </select>

                <label for="password">Ẩn hiện:</label>
                <select id="ShowHide" name="ShowHide">
                    <option value="1" <?php if (($user['AnHien']) == '1') echo "selected" ?>>Hiện
                    </option>
                    <option value="0" <?php if (($user['AnHien']) == '0') echo "selected" ?>>Ẩn
                    </option>
                </select>

                <label for="password">Mật khẩu:</label>
                <input type="text" id="password" name="password" value="<?= $user['password'] ?>" required>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" value="<?= $user['phone'] ?>">

                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" value="<?= $user['address'] ?>">
            </div>
            <div class="btn-submit-new-user">
                <button type="submit">Cập nhật</button>
            </div>
        </form>

    </div>
</body>