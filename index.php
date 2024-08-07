<?php
session_start();
// Đóng vai trò điều hướng đến các controller
switch ($_GET['ctrl']) {
    case 'page':
        include_once 'controllers/c_page.php';
        break;

    case 'user':
        include_once 'controllers/c_user.php';
        break;

    case 'product':
        include_once 'controllers/c_product.php';
        break;

    case 'comment':
        include_once 'controllers/c_comment.php';
        break;

    case 'cart':
        include_once 'controllers/c_cart.php';
        break;

    case 'order':
        include_once 'controllers/c_order.php';
        break;

    default:
        header('Location: ?ctrl=page&view=home');
        break;
}
