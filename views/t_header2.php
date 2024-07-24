<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CShop</title>
    <link rel="stylesheet" href="public/css/style2.css">
    <script src="public\js\jquery-3.7.1.min.js"></script>
</head>

<body>
    <h1>DSHOP</h1>
    <p>Chào mừng đến với cửa hàng của Duy</p>
    <ul id="menu">
        <li>
            <a href="?ctrl=page&view=home">Trang chủ</a>
        </li>
        <li>
            <a href="?ctrl=page&view=about">Giới thiệu</a>
        </li>
        <li>
            <a href="?ctrl=product&view=cart">Giỏ hàng</a>
        </li>

        <?php if (!isset($_SESSION['user'])) : ?>
        <li>
            <a href="?ctrl=user&view=login">Đăng nhập</a>
        </li>
        <li>
            <a href="?ctrl=user&view=register">Đăng ký</a>
        </li>
        <?php else : ?>
        <li>
            <a href="?ctrl=user&view=profile">Xin chào, <?= $_SESSION['user']['fullname'] ?></a>
        </li>
        <li>
            <a href="?ctrl=user&view=logout">Đăng xuất</a>
        </li>
        <?php endif; ?>

    </ul>