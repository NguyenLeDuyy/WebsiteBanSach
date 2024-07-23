<?php
    $email = 'nguyenleduy@gmail.com';
    $pass  = '123';

    if($_POST['email'] == $email && $_POST['password'] == $pass){
        echo "Đăng nhập thành công!";
    }
    else{
        echo "Sai email hoặc mật khẩu";
    }
?>