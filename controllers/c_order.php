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


    case 'orderDetailAdmin':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $order = order_getById($_GET['id']);
        $order_detail = orderDetail_getByOrderIdFromAdmin($order['id']);
        // print_r($order_detail);

        // Hiển thị ra view
        include_once 'views/t_headerAdmin.php';
        include_once 'views/t_asideAdmin.php';
        include_once 'views/v_order_detailAdmin.php';
        include_once 'views/t_footerAdmin.php';
        break;

    case 'orderAdmin':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $listOrders = order_getAllForAdminDashBoard();

        // Kiểm tra đã đăng nhập và là admin
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin')) {
            header('Location: index.php');
        }

        // Hiển thị ra view
        include_once 'views/t_headerAdmin.php';
        include_once 'views/t_asideAdmin.php';
        include_once 'views/t_icon_ShowHideSideBarAdmin.php';
        include_once 'views/v_order_Admin.php';
        include_once 'views/t_footerAdmin.php';
        break;

    case 'updateStatus':
        // Kiểm tra đã đăng nhập và là admin
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin')) {
            header('Location: index.php');
            exit;
        }

        // Xử lý dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $order_id = $_POST['order_id'];
            $status = $_POST['status'];

            // Gọi hàm cập nhật trạng thái đơn hàng
            include_once 'models/m_order.php';
            order_updateStatus($order_id, $status);
        }

        // Chuyển hướng về trang quản lý đơn hàng
        header('Location: ?ctrl=order&view=orderAdmin');
        exit;

    default:
        # code...
        break;
}
