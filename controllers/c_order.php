<?php
// Quản lý những trang không liên quan đến nhau
// Vd: Trang chủ, Liên hiện, Giới thiệu
switch ($_GET['view']) {
    case 'order':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $_SESSION['order'] = order_getByUserId($_SESSION['user']['id']);
        // print_r($_SESSION['order']);

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


        print_r("<pre>");
        print_r($_SESSION['cart']);
        print_r("</pre>");
        $total_amount = 0;
        foreach ($_SESSION['cart'] as $cart) {
            if ($cart['discounted_price'] != null) {
                $total_amount += $cart['discounted_price'];
            } else {
                $total_amount += $cart['price'];
            }
        }

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

            if ($delivery_method == "express") {
                $total_amount += 30000;
            }

            if ($total_amount == null) echo "Tổng bằng null";

            $cart = cart_getByUserId_NewPending($_SESSION['user']['id']);
            // print_r($cart);

            if ($cart) {
                //create new order
                $order_id = createNewOrder($user_id, $cart_id, $total_amount, $payment_method, $delivery_method);
                $_SESSION['order'] = order_getById($order_id);

                print_r($_SESSION['order']);
            } else {
                echo "Không tìm thấy đơn hàng.";
            }
        }

        header('Location: ?ctrl=order&view=order');

        break;

    default:
        # code...
        break;
}
