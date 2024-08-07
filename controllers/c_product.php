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
        include_once 'views/t_header_home_page.php';
        include_once 'views/t_aside.php';
        include_once 'views/v_product_category.php';
        include_once 'views/t_footer.php';
        # code...
        break;
    case 'detail':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $sp = product_getById($_GET['id']);

        if ($sp['image_urls'] != null)
            $other_images = json_decode($sp['image_urls'], true);
        else
            $other_images = ["unUpdate.svg", "unUpdate.svg"];
        // print_r($other_images);

        include_once 'models/m_comment.php';
        $dsBL = comment_getByProductId($_GET['id']);

        // Hiển thị dữ liệu
        include_once 'views/t_header_product_detail.php';
        include_once 'views/v_product_detail.php';
        include_once 'views/t_footer.php';
        # code...
        break;

    case 'all':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $dsSP = product_getAll();

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/t_aside.php';
        include_once 'views/v_product_all.php';
        include_once 'views/t_footer.php';
        break;

    default:
        # code...
        break;
}
