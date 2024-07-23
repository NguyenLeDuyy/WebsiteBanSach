<?php
    $email = [
        'cuong@gmail.com',
        'duy@gmail.com',
        'lan@gmail.com',
        'long@gmail.com',
    ];
    $pass  = [
        '123',
        '234',
        '456',
        '567',
    ];

    //Kiểm tra có email người dùng nhập trong $email hay không
    $isSuccess = false;
    for($i = 0; $i < count($email); $i++){
        if($_POST['email'] == $email[$i] && $_POST['password'] == $pass[$i]){
            $isSuccess = true;
        }
    }
    if ($isSuccess){
        echo "Đăng nhập thành công<br>";
    }
    else{
        echo "Sai email hoặc mật khẩu<br>";
    }

    for($i = 0; $i < count($pass); $i++){
        echo $pass[$i]."<br>";
    }
    
    
?>