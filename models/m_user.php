<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';

function user_login($email, $password)
{
    // Do email và password là chuỗi => phải thêm dấu ''
    return pdo_query_one("SELECT * FROM accounts WHERE 
    email='$email' AND password='$password'");
}

function user_register($fullname, $email, $password)
{
    return pdo_execute("INSERT INTO accounts (`fullname`, `username`, `password`, `email`) VALUES 
    ('$fullname', '$fullname', '$password', '$email')");
}

function user_checkEmail($email)
{
    $user = pdo_query_one("SELECT * FROM accounts WHERE email = '$email'");
    if ($user) return true;
    else return false;
}