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

function insertCartDetail($cart_id, $product_id)
{
    pdo_execute("INSERT INTO cart_detail (`cart_id`,`product_id`, `quantity`) VALUES
    ($cart_id, $product_id, 0)
    "); // Phải set Quantity = 0 vì sau khi addNewCart còn có kiểm tra thêm điều kiện if ($sp['product_id'] == $book_id)
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
    insertCartDetail($cart['id'], $product_id);

    return $cart['id'];
}

function handleAddToCart($user_id, $book_id)
{
    // Kiểm tra xem người dùng đã có giỏ hàng nào chưa
    $cart = cart_getByUserId_Basic($user_id);

    if (!$cart) {
        // Nếu chưa có giỏ hàng nào, tạo một giỏ hàng mới
        $cart_id = addNewCart($user_id, $book_id);
    } else {
        // Nếu đã có giỏ hàng, kiểm tra trạng thái của giỏ hàng
        if ($cart['cart_status'] == 'Pending') {
            // Nếu giỏ hàng đang ở trạng thái 'Pending', tạo một giỏ hàng mới
            $cart_id = addNewCart($user_id, $book_id);
        } else {
            // Nếu giỏ hàng đang ở trạng thái 'active', thêm sản phẩm vào giỏ hàng đó
            $cart_id = $cart['id'];
            $inCart = false; // Giả sử chưa có trong giỏ hàng
            foreach ($_SESSION['cart'] as &$sp) { // Phải truyền tham biến
                if ($sp['product_id'] == $book_id) { // Đã có SP trong giỏ hàng -> Tăng số lượng
                    updateQuantity($cart_id, $book_id, $sp['quantity'], '+');
                    $sp['quantity']++;
                    $inCart = true;
                    break;
                }
            }

            if (!$inCart) { // Chưa có sản phẩm trong giỏ hàng -> Thêm vào giỏ hàng
                insertCartDetail($cart_id, $book_id);
            }
        }
    }

    // Cập nhật lại giỏ hàng trong session
    $_SESSION['cart'] = cartDetail_getByUserId($user_id);
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
    pdo_execute("DELETE FROM cart WHERE user_id = $user_id");
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

function updateTotalAmountAndStatusPending($cart_id, $total_amount)
{
    pdo_execute("UPDATE cart
        SET total_amount=$total_amount,
            cart_status = 'Pending'
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
