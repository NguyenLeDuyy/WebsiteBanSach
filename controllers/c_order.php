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

    default:
        # code...
        break;
}
