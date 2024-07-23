<?php
// Quản lý những trang liên quan đến tài khoản
// Vd: Đăng nhập, đăng ký, hồ sơ cá nhân, ...
switch ($_GET['view']) {
    case 'login':
        // Xử lý dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include_once 'models/m_user.php';
            $user = user_login($_POST['email'], $_POST['password']);
            if ($user) { // Đăng nhập thành công
                echo "Đăng nhập thành công";
                $_SESSION['user'] = $user;
                header('Location: ?ctrl=page&view=home');
            } else { // Đăng nhập thất bại
                echo "Email hoặc mật khẩu không khớp!";
            }
        }
        // Hiển thị ra view
        include_once 'views/t_header.php';
        include_once 'views/v_user_login.php';
        include_once 'views/t_footer.php';
        # code...
        break;

    case 'register':
        // Xử lý dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include_once 'models/m_user.php';
            if (user_checkEmail($_POST['email'])) { // Kiểm tra email có trùng không?
                echo "Email đã được sử dụng! Không thể đăng ký!";
            } else {
                if ($_POST['password'] != $_POST['repassword']) { // Kieemr tra mật khẩu có khớp không?
                    echo "Mật khẩu không khớp";
                } else {
                    $user = user_register($_POST['fullname'], $_POST['email'], $_POST['password']);
                    header("Location: ?ctrl=user&view=login");
                }
            }
        }
        // Hiển thị ra view
        include_once 'views/t_header.php';
        include_once 'views/v_user_register.php';
        include_once 'views/t_footer.php';
        # code...
        break;
    case 'logout':
        // Xử lý dữ liệu
        unset($_SESSION['user']);
        header("Location: ?ctrl=user&view=login");
        break;
    default:
        # code...
        break;
}
