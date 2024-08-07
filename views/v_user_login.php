<div class="container login-container">
    <div class="login-box">
        <h2 class="title">Đăng nhập</h2>
        <form class="login-form" id="loginForm" action="" method="post">
            <label for="email">Email:</label><br>
            <input class="form-control" type="email" name="email" id="email"><br>
            <label for="password">Mật khẩu: </label><br>
            <input class="form-control" type="password" name="password" id="password"><br>
            <div class="btn-login-form">
                <a href="#" style="text-decoration: none;">
                    <button class="btn-order btn-login" type="submit">Đăng nhập</button>
                </a>
                <a href="?ctrl=user&view=register" style="text-decoration: none;">
                    <button class="btn-continue btn-register" type="button">Đăng ký</button>
                </a>
            </div>
        </form>
    </div>
</div>

<script src="public/js/loginValidation.js"></script>
<script>
    function redirectToRegister() {
        window.location.href = "?ctrl=user&view=register";
    }
</script>