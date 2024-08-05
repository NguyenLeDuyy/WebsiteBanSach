<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà sách DuyKhang</title>
    <link rel="stylesheet" href="public\css\header.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public\css\home\stylesmain.css">
    <link rel="stylesheet" href="public\css\home\styleshome.css"> <!-- Liên kết đến tệp CSS -->
    <link rel="icon" href="public\img\cover_slide\logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public\css\stylesreview.css">

    <link rel="stylesheet" href="public\css\about.css">
    <link rel="stylesheet" href="public\css\news.css">

    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="stylesheet" href="/sanpham/sp.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <header>
        <button class="bg"></button>
        <div class="search-container">
            <input type="text" placeholder="Tìm kiếm...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        <div class="right-header">
            <ul class="account-and-cart">
                <?php if (isset($_SESSION['user'])) : ?>
                <li class="account-header">
                    <a href="?ctrl=user&view=profile">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a href="?ctrl=user&view=profile">
                        <p>Tài khoản</p>
                    </a>
                    <div class="box-login-dropdown">
                        <ul class="login-dropdown">
                            <li class="login-element">
                                <a href="?ctrl=user&view=profile">Xin chào, <?= $_SESSION['user']['fullname'] ?></a>
                            </li>
                            <li class="signup-element">
                                <a href="?ctrl=user&view=logout">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="cart-header">
                    <a href="?ctrl=cart&view=view">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a href="?ctrl=cart&view=view">
                        <p>Giỏ hàng</p>
                    </a>
                </li>
                <?php else : ?>
                <li class="account-header">
                    <a href="?ctrl=user&view=login">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a href="?ctrl=user&view=login">
                        <p>Tài khoản</p>
                    </a>
                    <div class="box-login-dropdown">
                        <ul class="login-dropdown">
                            <li class="login-element">
                                <a href="?ctrl=user&view=login">Đăng nhập</a>
                            </li>
                            <li class="signup-element">
                                <a href="?ctrl=user&view=register">Đăng ký</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="cart-header">
                    <a href="?ctrl=user&view=login">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a href="?ctrl=user&view=login">
                        <p>Giỏ hàng</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <nav>
        <ul class="menu">
            <li class="menu__item"><a href="?ctrl=page&view=home">Trang chủ</a></li>
            <li class="menu__item"><a href="?ctrl=page&view=about">Giới thiệu</a></li>
            <li class="menu__item"><a href="?ctrl=product&view=all">Sách nổi bật</a></li>
            <li class="menu__item"><a href="/reviewsach/review.html">Review sách</a></li>
            <li class="menu__item"><a href="?ctrl=page&view=news">Tin tức</a></li>
        </ul>
    </nav>