<?php

function calculateTotalAmnount($listCartDetail, $delivery_method)
{
    $total_amount = 0;
    foreach ($listCartDetail as $cart) {
        if ($cart['discounted_price'] != null) {
            $total_amount += $cart['discounted_price'];
        } else {
            $total_amount += $cart['price'];
        }
    }

    if ($delivery_method == "express") {
        $total_amount += 30000;
    }

    return $total_amount;
}

switch ($_GET['view']) {
    case 'order':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $_SESSION['order'] = order_getByUserId($_SESSION['user']['id']);

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_order.php';
        include_once 'views/t_footer.php';
        break;
    case 'orderProcess':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];

        // print_r("<pre>");
        // print_r($_SESSION['cart']);
        // print_r("</pre>");

        $cart_id = $_SESSION['cart'][0]['cart_id'];
        if ($cart_id) {
            updateStatusPending($cart_id);
        } else {
            echo "Cart ID not found.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $delivery_method = $_POST['delivery_method'];
            $payment_method = $_POST['payment_method'];
            $total_amount = calculateTotalAmnount($_SESSION['cart'], $delivery_method);
            $cart = cart_getByUserId_NewPending($_SESSION['user']['id']);

            if ($cart) {
                //create new order
                $order_id = createNewOrder($user_id, $cart_id, $total_amount, $payment_method, $delivery_method);
                foreach ($_SESSION['cart'] as $sp) {
                    insertOrderDetail($order_id, $sp['product_id'], $sp['quantity']);
                }
                $_SESSION['order'] = order_getById($order_id);
            } else {
                echo "Không tìm thấy đơn hàng.";
            }
        }

        header('Location: ?ctrl=order&view=order');

        break;
    case 'orderDetail':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $order = order_getById($_GET['id']);
        $order_detail = orderDetail_getByOrderId($_SESSION['user']['id'], $order['id']);
        // print_r($order_detail);

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_order_detail.php';
        include_once 'views/t_footer.php';
        break;

    default:
        # code...
        break;
}