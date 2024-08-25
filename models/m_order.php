<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';

function order_countAll()
{
    return pdo_query_one("SELECT count(*) FROM orders");
}

function order_totalCountAllWithStatusProcessingAndDelivered()
{
    return pdo_query_one("SELECT SUM(total_amount) FROM orders WHERE status='Processing' OR status='Delivered'");
}

function order_getAllForAdminDashBoard()
{
    return pdo_query("SELECT o.id, a.fullname as fullname, status, total_amount, payment_status FROM orders o
     INNER JOIN accounts a ON a.id = o.user_id
     WHERE o.total_amount>0
     ORDER BY o.id DESC");
}

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
    return pdo_query("SELECT * FROM orders WHERE user_id = $user_id");
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

function orderDetail_getByOrderId($user_id, $order_id)
{
    // Chưa chắc có cart_id trong cart_detail nên lấy trong cart
    return pdo_query("SELECT
        o.id as order_id,
        o.status,
        b.id as product_id,
        b.title,
        b.cover_image,
        bd.quantity,
        b.price,
        b.discounted_price
    FROM
        order_detail bd
    INNER JOIN orders o ON bd.order_id = o.id
    INNER JOIN books b ON bd.product_id = b.id
    WHERE
        o.id = $order_id
        AND
        o.user_id = $user_id
    ");
}

function orderDetail_getByOrderIdFromAdmin($order_id)
{
    // Chưa chắc có cart_id trong cart_detail nên lấy trong cart
    return pdo_query("SELECT
        o.id as order_id,
        o.status,
        b.id as product_id,
        b.title,
        b.cover_image,
        bd.quantity,
        b.price,
        b.discounted_price
    FROM
        order_detail bd
    INNER JOIN orders o ON bd.order_id = o.id
    INNER JOIN books b ON bd.product_id = b.id
    WHERE
        o.id = $order_id
    ");
}

function changePaymentStatus($order_id)
{
    pdo_execute("UPDATE orders SET payment_status='Đã thanh toán' WHERE id=$order_id AND status!='Pending'");
}

function order_updateStatus($order_id, $status)
{
    if ($status == 'Pending')
        pdo_execute("UPDATE orders SET status='$status', payment_status='Chưa thanh toán' WHERE id=$order_id");
    else
        pdo_execute("UPDATE orders SET status='$status', payment_status='Đã thanh toán' WHERE id=$order_id");
}
