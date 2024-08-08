<?php
// Quản lý những trang không liên quan đến nhau
// Vd: Trang chủ, Liên hiện, Giới thiệu
switch ($_GET['view']) {
    case 'order':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $orders = order_getById($_SESSION['user']['id']);
        print_r($orders);

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_order.php';
        include_once 'views/t_footer.php';
        break;
    case 'orderProcess':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        include_once 'models/m_cart.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $delivery_method = $_POST['delivery_method'];
            $payment_method = $_POST['payment_method'];
            $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0;

            $user_id = $_SESSION['user']['id'];
            $cart = cart_getByUserId_NewPending($user_id);

            if ($cart) {
                $cart_id = $cart['id'];
                //create new order
                $order_id = createNewOrder($user_id, $cart_id, $total_amount, $payment_method, $delivery_method);
                $_SESSION['order'] = order_getById($order_id);
                print_r($_SESSION['order']);
            } else {
                echo "Không tìm thấy giỏ hàng.";
            }
        }

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_order.php';
        include_once 'views/t_footer.php';
        break;

    default:
        # code...
        break;
}
