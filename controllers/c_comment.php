<?php
// Quản lý những trang liên quan đến sản phẩm
// Vd: Danh mục sản phẩm, chi tiết sản phẩm, giỏ hàng, ...
switch ($_GET['view']) {
    case 'add':
        // Xử lý dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include_once 'models/m_comment.php';
            comment_add($_SESSION['user']['id'], $_POST['product_id'], $_POST['comment']);
            header("Location: ?ctrl=product&view=detail&id=" . $_POST['product_id']);
        }
        break;


    default:
        # code...
        break;
}
