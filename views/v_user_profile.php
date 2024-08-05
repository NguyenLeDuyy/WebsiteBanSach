<div class="base-container-for-cart">
    <h1>Hồ sơ của bạn</h1>
    <form class="row user-profile" action="" method="POST" enctype="multipart/form-data">
        <div class="col-25">
            <div class="avatar">
                <?php if ($_SESSION['user']['avatar'] == null) : ?>
                <img src="public\img\logo\userDefault.svg" alt="">
                <?php else : ?>
                <img src="public/img/avatar/<?= $_SESSION['user']['avatar'] ?>" alt="">
                <?php endif; ?>
            </div>
            <input type="file" name="avatar" id="">
        </div>
        <div class=" col-75">
            <label for="fullname">Họ tên</label><br>
            <input type="text" name="fullname" id="fullname" value="<?= $_SESSION['user']['fullname'] ?>"><br><br>

            <label for="address">Địa chỉ</label><br>
            <input type="text" name="address" id="address" value="<?= $_SESSION['user']['address'] ?>"><br><br>

            <label for="phone_number">Điện thoại</label><br>
            <input type="text" name="phone_number" id="phone_number" value="<?= $_SESSION['user']['phone'] ?>"><br><br>
            <hr>

            <label for="Email">Email</label><br>
            <input type="email" name="Email" id="Email" value="<?= $_SESSION['user']['email'] ?>"><br><br>

            <label for="password">Đổi mật khẩu</label><br>
            <input type="password" name="password" id="password"><br><br>

            <label for="repassword">Nhập lại mật khẩu</label><br>
            <input type="password" name="repassword" id="repassword"><br><br>

            <button class="btn-order" type="submit">Lưu thay đổi</button>
        </div>
    </form>
</div>