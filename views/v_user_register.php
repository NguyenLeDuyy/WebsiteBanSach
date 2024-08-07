<div class="container register-container">
    <div class="register-box">
        <h2 class="title">Đăng ký</h2>
        <form class="register-form" id="registerForm" action="" method="post">
            <label for="fullname">Họ và tên:</label><br>
            <input class="form-control" type=" text" name="fullname" id="fullname"><br>

            <label for="email">Email:</label><br>
            <input class="form-control" type="email" name="email" id="email"><br>

            <label for="password">Mật khẩu: </label><br>
            <input class="form-control" type="password" name="password" id="password"><br>

            <label for="repassword">Nhập lại mật khẩu: </label><br>
            <input class="form-control" type="password" name="repassword" id="repassword"><br>

            <div class="btn-register-form">
                <button type="submit" class="btn-order">Đăng ký</button>
                <a class="register-comeback" href="?ctrl=user&view=login">
                    <<< Quay về trang đăng nhập</a>
            </div>
        </form>
    </div>
</div>

<script src="public\js\registerValidation.js"></script>