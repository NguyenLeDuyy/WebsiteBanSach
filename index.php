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

    default:
        header('Location: ?ctrl=page&view=home');
        break;
}
