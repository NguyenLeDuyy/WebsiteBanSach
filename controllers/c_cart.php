<?php

switch ($_GET['view']) {
    case 'view':
        // Xử lý dữ liệu
        // unset($_SESSION['cart']);
        // print_r($_SESSION['cart']);
        include_once 'models/m_cart.php';
        $_SESSION['cart'] = cartDetail_getByUserId($_SESSION['user']['id']);
        print_r($_SESSION['cart']);
        // include_once 'models/m_product.php';

        // foreach ($_SESSION['cart'] as &$sp) {
        //     $info = product_getById($sp['id']);
        //     $sp['title'] = $info['title'];
        //     $sp['cover_image'] = $info['cover_image'];
        //     $sp['price'] = $info['price'];
        //     $sp['discounted_price'] = $info['discounted_price'];
        //     unset($sp);
        // }


        // Hiển thị dữ liệu
        include_once 'views/t_header.php';
        include_once 'views/v_cart.php';
        include_once 'views/t_footer.php';

        break;
    case 'addToCart':
        // Xử lý dữ liệu
        include_once 'models/m_cart.php';
        include_once 'models/m_product.php';
        $book_id = $_GET['id'];
        $user_id = $_SESSION['user']['id'];
        $info = product_getById($_GET['id']);
        $_SESSION['cart'] = cartDetail_getByUserId($user_id);
        $cart = cart_getByUserId_Basic($user_id);
        $cart_id = $cart['id'];
        // echo "Cart id: " . $cart_id;

        if (count($_SESSION['cart']) == 0) {
            addNewCart($user_id, $book_id);
            $_SESSION['cart'] = cartDetail_getByUserId($user_id);
            // echo "Không có sản phẩm";
        }

        $inCart = false; // Giả sử chưa có trong giỏ hàng
        foreach ($_SESSION['cart'] as &$sp) { // Phải truyền tham biến
            if ($sp['product_id'] == $book_id) { // Đã có SP trong giỏ hàng -> Tăng số lượng
                updateQuantity($cart_id, $book_id, $sp['quantity']);
                $sp['quantity']++;
                $inCart = true;
                break;
            }
        }

        if (!$inCart) { // Chưa có sản phẩm trong giỏ hàng -> Thêm vào giỏ hàng
            insertCartDetail($cart_id, $book_id);
            $_SESSION['cart'] = cartDetail_getByUserId($_SESSION['user']['id']);
        }

        // print_r($_SESSION['cart']);
        header('Location: ?ctrl=cart&view=view');
        break;

    case 'removeFromCart':
        // Xử lý dữ liệu
        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $book_id = $_GET['id'];
        $index = $_GET['index']; // Lấy ra thứ tự trong cart table 
        $cart = cart_getByUserId_Basic($user_id);
        $cart_id = $cart['id'];
        array_splice($_SESSION['cart'], $index, 1); // Cập nhật giao diện
        removeFromCart($cart_id, $book_id);
        $_SESSION['cart'] = cartDetail_getByUserId($_SESSION['user']['id']);
        header('Location: ?ctrl=cart&view=view');
        break;

    case 'removeAllFromCart':
        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $cart = cart_getByUserId_Basic($user_id);
        $cart_id = $cart['id'];
        removeAllFromCart($user_id, $cart_id);
        unset($_SESSION['cart']);
        header('Location: ?ctrl=cart&view=view');
        break;

    case 'plusQuantity':
        $index = $_GET['index'];
        $_SESSION['cart'][$index]['quantity']++;
        header('Location: ?ctrl=cart&view=view');
        break;

    case 'subQuantity':
        $index = $_GET['index'];
        $_SESSION['cart'][$index]['quantity']--;
        if ($_SESSION['cart'][$index]['quantity'] == 0) {
            array_splice($_SESSION['cart'], $index, 1);
        }
        header('Location: ?ctrl=cart&view=view');
        break;
    default:
        # code...
        break;
}
