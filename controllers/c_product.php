<?php
// Quản lý những trang liên quan đến sản phẩm
// Vd: Danh mục sản phẩm, chi tiết sản phẩm, giỏ hàng, ...
switch ($_GET['view']) {
    case 'category':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $dsSP = product_getByCategory($_GET['id']);
        include_once 'models/m_categories.php';
        $dm = categories_getById($_GET['id']);
        // Hiển thị dữ liệu
        include_once 'views/t_header.php';
        include_once 'views/v_product_category.php';
        include_once 'views/t_footer.php';
        # code...
        break;
    case 'detail':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $sp = product_getById($_GET['id']);
        include_once 'models/m_comment.php';
        $dsBL = comment_getByProductId($_GET['id']);

        // Hiển thị dữ liệu
        include_once 'views/t_header.php';
        include_once 'views/v_product_detail.php';
        include_once 'views/t_footer.php';
        # code...
        break;



    default:
        # code...
        break;
}
