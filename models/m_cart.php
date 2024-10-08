<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';

function cart_getByUserId_Basic($user_id)
{
    return pdo_query_one("SELECT * FROM cart WHERE user_id = $user_id AND cart_status = 'active'");
}

function cart_getByUserId_NewPending($user_id)
{
    return pdo_query_one("SELECT * FROM cart WHERE user_id = $user_id AND cart_status = 'Pending' ORDER BY id DESC LIMIT 1");
}

function cartDetail_getByUserId($user_id)
{
    // Chưa chắc có cart_id trong cart_detail nên lấy trong cart
    return pdo_query("SELECT
        c.id as cart_id,
        c.cart_status,
        b.id as product_id,
        b.title as product_title,
        b.cover_image,
        b.title,
        bd.quantity,
        b.price,
        b.discounted_price
    FROM
        cart_detail bd
    INNER JOIN cart c ON bd.cart_id = c.id
    INNER JOIN books b ON bd.product_id = b.id
    WHERE
        c.cart_status = 'active'
        AND
        c.user_id = $user_id
    ");
}

function insertCartDetailWithQuantity($cart_id, $product_id, $quantity)
{
    pdo_execute("INSERT INTO cart_detail (`cart_id`,`product_id`, `quantity`) VALUES
    ($cart_id, $product_id, $quantity);
    ");
}

function addNewCart($user_id, $product_id)
{
    pdo_execute("INSERT INTO cart (`user_id`, `cart_status`) VALUES
    ($user_id, 'active')");
    $cart = pdo_query_one("SELECT * FROM cart WHERE user_id = $user_id AND cart_status = 'active' ORDER BY id DESC LIMIT 1");
    insertCartDetailWithQuantity($cart['id'], $product_id, 1);

    return $cart['id'];
}

function removeFromCartDetail($cart_id, $product_id)
{
    pdo_execute("DELETE FROM cart_detail
        WHERE cart_id = $cart_id
        AND product_id = $product_id
    ");
}

function removeAllFromCart($user_id, $cart_id)
{
    pdo_execute("DELETE FROM cart_detail WHERE cart_id = $cart_id");
    pdo_execute("DELETE FROM cart WHERE user_id = $user_id AND cart_status = 'active'");
}

function updateQuantity($cart_id, $product_id, $current_quantity, $operator)
{
    if ($operator == '+') {
        pdo_execute("UPDATE cart_detail 
        SET quantity=$current_quantity+1 
        WHERE cart_id = $cart_id 
        AND product_id = $product_id
        ");
    }

    if ($operator == '-') {

        pdo_execute("UPDATE cart_detail 
        SET quantity=$current_quantity-1 
        WHERE cart_id = $cart_id 
        AND product_id = $product_id
        ");

        if ($current_quantity == 1) {
            removeFromCartDetail($cart_id, $product_id);
        }
    }
}

function updateStatusPending($cart_id)
{
    pdo_execute("UPDATE cart
        SET cart_status = 'Pending'
        WHERE id = $cart_id 
        ");
}

function updatePaymentAndDeliveryMethod($cart_id, $payment_method, $delivery_method)
{
    pdo_execute("UPDATE cart
        SET payment_method=$payment_method,
            delivery_method = $delivery_method
        WHERE id = $cart_id 
        ");
}