<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <div class="main-content">
        <div class="container">
        <div class="sidebar">
    <h2>Bảng Điều Khiển</h2>
    <ul>
        <li><a href="?controller=dashboard">Tổng Quan</a></li>
        <li><a href="?controller=users">Người Dùng</a></li>
        <li><a href="?controller=orders">Đơn Hàng</a></li>
        <li><a href="?controller=products">Sản Phẩm</a></li>
        <li><a href="?controller=account-settings">Cài Đặt</a></li>
        <li><a href="?controller=logout">Đăng Xuất</a></li>
    </ul>
</div>
            <div class="content">
                <?php
                $controller = isset($_GET['controller']) ? $_GET['controller'] : 'dashboard';
                $action = isset($_GET['action']) ? $_GET['action'] : 'index';

                switch ($controller) {
                    case 'dashboard':
                        require 'admin/dashboard.php';
                        break;
                    case 'users':
                        require 'admin/users.php';
                        break;
                    case 'orders':
                        require 'admin/orders.php';
                        break;
                    case 'products':
                        require 'admin/products.php';
                        break;
                    case 'add-product':
                    require 'admin/add-product.php';
                    break;
                    case 'edit-product':
                    require 'admin/edit-product.php';
                    break;
                    case 'account-settings':
                        require 'admin/settings.php';
                        break;
                    case 'logout':
                        require 'admin/logout.php';
                        break;
                    
                    default:
                        require 'admin/dashboard.php';
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
