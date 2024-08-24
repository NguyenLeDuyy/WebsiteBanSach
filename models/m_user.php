<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';

function user_countAll()
{
    return pdo_query_one("SELECT count(*) FROM accounts");
}

function user_login($email, $password)
{
    // Do email và password là chuỗi => phải thêm dấu ''
    return pdo_query_one("SELECT * FROM accounts WHERE 
    email='$email' AND password='$password'");
}

function user_register($fullname, $email, $password)
{
    pdo_execute("INSERT INTO accounts (`fullname`, `username`, `password`, `email`) VALUES ('$fullname', '$fullname', '$password', '$email')");
    return pdo_query_one("SELECT * FROM accounts WHERE email='$email'");
}

function user_checkEmail($email)
{
    $user = pdo_query_one("SELECT * FROM accounts WHERE email = '$email'");
    if ($user) return true;
    else return false;
}

function user_updateInfo($user_id, $fullname, $address, $phone_number, $email, $city = null, $district = null, $ward = null)
{
    pdo_execute("UPDATE accounts SET fullname='$fullname', phone='$phone_number', 
    address='$address', email='$email', city=$city, district=$district, ward=$ward WHERE id=$user_id");
}

function user_changePassword($user_id, $new_password)
{
    pdo_execute("UPDATE accounts SET password='$new_password' WHERE id=$user_id");
}

function user_changeAvatar($user_id, $avatar)
{
    pdo_execute("UPDATE accounts SET avatar='$avatar' WHERE id=$user_id");
}

function user_getById($user_id)
{
    return pdo_query_one("SELECT * FROM accounts WHERE id=$user_id");
}

function currentIdUser()
{
    $arr_id = pdo_query_one("SELECT id FROM accounts ORDER BY id DESC LIMIT 1");
    // Vì khi trả về sẽ là Array ( [id] => 14 )
    return $arr_id['id'];
}
