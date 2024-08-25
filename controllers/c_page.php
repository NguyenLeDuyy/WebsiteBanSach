<?php
// Quản lý những trang không liên quan đến nhau
// Vd: Trang chủ, Liên hiện, Giới thiệu
switch ($_GET['view']) {
    case 'home':
        // unset($_SESSION['user']);
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $dsSP = product_getAll();
        $featuredSP = product_getFeatured(); // Lấy các sản phẩm nổi bật
        $familySP = product_getByCategoryWithLimit(4);
        include_once 'models/m_categories.php';
        $dsDM = categories_getAll();

        include_once 'models/m_news.php';
        $someNews = news_getAll();

        // echo "<pre>";
        // print_r($dsDM);
        // echo "</pre>";

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/t_aside.php';
        include_once 'views/v_page_home2.php';
        include_once 'views/t_footer.php';
        break;

    case 'about':
        // Xử lý dữ liệu

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_page_about.php';
        include_once 'views/t_footer.php';
        break;

    case 'news':
        // Xử lý dữ liệu

        // Hiển thị ra view
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_page_news.php';
        include_once 'views/t_footer.php';
        break;

    case 'dashboard':
        // Xử lý dữ liệu
        include_once 'models/m_order.php';
        $total_orders = order_countAll();
        $total_orders = $total_orders['count(*)'];

        include_once 'models/m_product.php';
        $total_products = order_countAll();
        $total_products = $total_products['count(*)'];

        $total_amount = order_totalCountAllWithStatusProcessingAndDelivered();
        $total_amount = $total_amount['SUM(total_amount)'];

        include_once 'models/m_user.php';
        $total_users = user_countAll();
        $total_users = $total_users['count(*)'];

        $listOrders = order_getAllForAdminDashBoard();

        // Kiểm tra đã đăng nhập và là admin
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin')) {
            header('Location: index.php');
        }
        // Hiển thị ra view
        include_once 'views/t_headerAdmin.php';
        include_once 'views/t_asideAdmin.php';
        include_once 'views/v_page_dashboardAdmin.php';
        break;



    default:
        # code...
        break;
}
