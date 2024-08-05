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
                // echo "Email hoặc mật khẩu không khớp!";
            }
        }
        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
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
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_user_register.php';
        include_once 'views/t_footer.php';
        # code...
        break;
    case 'logout':
        // Xử lý dữ liệu
        unset($_SESSION['user']);
        header("Location: ?ctrl=user&view=login");
        break;

    case 'profile':
        // Xử lý dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['Email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            // print_r($_FILES);
            // return;

            include_once 'models/m_user.php';
            user_updateInfo($_SESSION['user']['id'], $fullname, $address, $phone_number, $email);
            // Cập nhật lại $_SESSION để thấy thay đổi
            // Do trong file v_user_profile lấy thông tin từ session ra để hiển thị
            $_SESSION['user']['fullname'] = $fullname;
            $_SESSION['user']['address'] = $address;
            $_SESSION['user']['phone'] = $phone_number;
            $_SESSION['user']['email'] = $email;

            if (strlen($password) > 0) { // Có đổi mật khẩu

                if ($password != $repassword) {
                    echo "Mật khẩu nhập lại không khớp!";
                } else {
                    user_changePassword($_SESSION['user']['id'], $password);
                }
            }

            if ($_FILES['error'] == 0) {
                move_uploaded_file($_FILES['avatar']['tmp_name'], "public/img/avatar/" . $_FILES['avatar']['name']);
                user_changeAvatar($_SESSION['user']['id'], $_FILES['avatar']['name']);
                // Cập nhật lại $_SESSION để thấy thay đổi
                // Do trong file v_user_profile lấy thông tin từ session ra để hiển thị
                $_SESSION['user']['avatar'] = $_FILES['avatar']['name'];
            }

            header('Location: ?ctrl=user&view=profile');
        }

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_user_profile.php';
        include_once 'views/t_footer.php';
        break;
    default:
        # code...
        break;
}