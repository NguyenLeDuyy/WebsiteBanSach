<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';
function order_getAll()
{
    return pdo_query("SELECT * FROM orders");
}

function order_getById($order_id)
{
    return pdo_query_one("SELECT * FROM orders WHERE id = $order_id");
}

function order_getByUserId($user_id)
{
    return pdo_query_one("SELECT * FROM orders WHERE user_id = $user_id");
}

function createNewOrder($user_id, $cart_id, $total_amount, $payment_method, $delivery_method)
{
    pdo_execute("INSERT INTO orders (`user_id`, `cart_id`, `total_amount`, `payment_method`, `delivery_method`) VALUES
    ($user_id, $cart_id, $total_amount, '$payment_method', '$delivery_method')");

    $order = pdo_query_one("SELECT id FROM orders WHERE user_id = $user_id ORDER BY id DESC LIMIT 1");
    return $order['id'];
}

function insertOrderDetail($order_id, $product_id, $quantity)
{
    pdo_execute("INSERT INTO order_detail (`order_id`, `product_id`, `quantity`) VALUES
    ($order_id, $product_id, $quantity)");
}
