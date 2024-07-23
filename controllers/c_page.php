<?php
// Quản lý những trang không liên quan đến nhau
// Vd: Trang chủ, Liên hiện, Giới thiệu
switch ($_GET['view']) {
    case 'home':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $dsSP = product_getAll();
        include_once 'models/m_categories.php';
        $dsDM = categories_getAll();

        // echo "<pre>";
        // print_r($dsDM);
        // echo "</pre>";

        // Hiển thị ra view
        include_once 'views/t_header.php';
        include_once 'views/v_page_home.php';
        include_once 'views/t_footer.php';
        break;

    case 'about':
        // Xử lý dữ liệu

        // Hiển thị ra view
        include_once 'views/t_header.php';
        include_once 'views/v_page_about.php';
        include_once 'views/t_footer.php';
        break;

    default:
        # code...
        break;
}
