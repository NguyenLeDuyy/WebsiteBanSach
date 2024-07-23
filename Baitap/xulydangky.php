<?php
    $email = [
    'cuong@gmail.com',
    'nguyenleduy@gmail.com',
    'lan@gmail.com',
    'long@gmail.com',
    ];
    $pass  = [
        '123',
        '234',
        '456',
        '567',
    ];

    $isExisted = false;
    for ($i = 0; $i < count($email); $i++){
        if ($_POST['email'] == $email[$i]){
            $isExisted = true;
        }
    }
    if ($isExisted){
        echo "Email đã tồn tại, không thể đăng ký";
    }
    else {
        if ($_POST['password'] == $_POST['repassword']){
            echo "Đăng ký thành công";
            array_push($email, $_POST['email']); //Thêm email người dùng đã nhập
            array_push($pass, $_POST['password']); //Thêm password người dùng đã nhập
            print_r($email);
            print_r($pass);
        }
        else {
            echo "Mật khẩu nhập lại không trùng khớp";
        }
    }
?>