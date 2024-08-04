<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CShop</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <script src="public\js\jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="header-container ">
        <div class="container">
            <div class="left-header">
                <ul id="menu">
                    <li>
                        <a href="?ctrl=page&view=home">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?ctrl=page&view=about">Giới thiệu</a>
                    </li>

                    <?php if (!isset($_SESSION['user'])) : ?>
                    <li>
                        <a href="?ctrl=user&view=login">Giỏ hàng</a>
                    </li>
                    <li>
                        <a href="?ctrl=user&view=login">Đăng nhập</a>
                    </li>
                    <li>
                        <a href="?ctrl=user&view=register">Đăng ký</a>
                    </li>
                    <?php else : ?>
                    <li>
                        <a href="?ctrl=cart&view=view">Giỏ hàng</a>
                    </li>
                    <li>
                        <a href="?ctrl=user&view=logout">Đăng xuất</a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="right-header">
                <ul>
                    <?php if (isset($_SESSION['user'])) : ?>
                    <li>
                        <a href="?ctrl=user&view=profile">Xin chào, <?= $_SESSION['user']['fullname'] ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])) : ?>
                    <li>
                        <a href="?ctrl=user&view=profile"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li>
                        <a href="?ctrl=cart&view=view"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <?php else : ?>
                    <li>
                        <a href="?ctrl=user&view=login"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li>
                        <a href="?ctrl=user&view=login"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>