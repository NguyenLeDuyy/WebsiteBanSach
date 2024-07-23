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


    case 'cart':
        // Xử lý dữ liệu
        // unset($_SESSION['cart']);
        // print_r($_SESSION['cart']);
        include_once 'models/m_product.php';
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        foreach ($_SESSION['cart'] as &$sp) {
            $info = product_getById($sp['id']);
            $sp['title'] = $info['title'];
            $sp['cover_image'] = $info['cover_image'];
            $sp['price'] = $info['price'];
            $sp['discounted_price'] = $info['discounted_price'];
            unset($sp);
        }


        // Hiển thị dữ liệu
        include_once 'views/t_header.php';
        include_once 'views/v_product_cart.php';
        include_once 'views/t_footer.php';

        break;
    case 'addToCart':
        // Xử lý dữ liệu
        $book_id = $_GET['id'];
        if (!isset($_SESSION['cart'])) { // Chưa có giỏi hàng
            $_SESSION['cart'] = []; // Khai báo giỏ hàng
        }

        $inCart = false; // Giả sử chưa có trong giỏ hàng
        foreach ($_SESSION['cart'] as &$sp) { // Phải truyền tham biến
            if ($sp['id'] == $book_id) { // Đã có SP trong giỏ hàng -> Tăng số lượng
                $sp['quantity']++;
                $inCart = true;
                break;
            }
        }

        if (!$inCart) { // Chưa có sản phẩm trong giỏ hàng -> Thêm vào giỏ hàng
            array_push($_SESSION['cart'], [
                'id' => $book_id,
                'quantity' => 1,
            ]);
        }

        // print_r($_SESSION['cart']);
        header('Location: ?ctrl=product&view=cart');
        break;

    case 'removeFromCart':
        // Xử lý dữ liệu
        $index = $_GET['index'];
        array_splice($_SESSION['cart'], $index, 1);
        header('Location: ?ctrl=product&view=cart');
        break;

    case 'removeAllFromCart':
        unset($_SESSION['cart']);
        header('Location: ?ctrl=product&view=cart');
        break;

    case 'plusQuantity':
        $index = $_GET['index'];
        $_SESSION['cart'][$index]['quantity']++;
        header('Location: ?ctrl=product&view=cart');
        break;

    case 'subQuantity':
        $index = $_GET['index'];
        $_SESSION['cart'][$index]['quantity']--;
        if ($_SESSION['cart'][$index]['quantity'] == 0) {
            array_splice($_SESSION['cart'], $index, 1);
        }
        header('Location: ?ctrl=product&view=cart');
        break;
    default:
        # code...
        break;
}
