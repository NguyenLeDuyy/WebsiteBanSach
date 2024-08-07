<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';
function order_getAll()
{
    return pdo_query("SELECT * FROM orders");
}

function order_getById($user_id)
{
    return pdo_query_one("SELECT * FROM orders WHERE user_id = $user_id");
}
