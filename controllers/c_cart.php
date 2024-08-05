<?php

switch ($_GET['view']) {
    case 'view':
        // Xử lý dữ liệu
        // unset($_SESSION['cart']);
        // print_r($_SESSION['cart']);
        include_once 'models/m_cart.php';

        // $cart_id = $cart['id'];
        // echo "Cart id: " . $cart_id . "<br>";
        // print_r($_SESSION['cart']);
        // include_once 'models/m_product.php';

        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $_SESSION['cart'] = cartDetail_getByUserId($user_id);
            $cart = cart_getByUserId_Basic($user_id);
        } else {
            header('Location: ?ctrl=user&view=login');
            exit();
        }

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart.php';
        include_once 'views/t_footer.php';

        break;
    case 'addToCart':
        // Xử lý dữ liệu
        include_once 'models/m_cart.php';
        include_once 'models/m_product.php';

        if (isset($_SESSION['user'])) {
            $book_id = $_GET['id'];
            $user_id = $_SESSION['user']['id'];

            if (isset($_SESSION['cart'])) {
                addNewCart($user_id, $book_id);
                $_SESSION['cart'] = cartDetail_getByUserId($user_id);
            }

            $info = product_getById($_GET['id']);
            $_SESSION['cart'] = cartDetail_getByUserId($user_id);
            $cart = cart_getByUserId_Basic($user_id);
            $cart_id = $cart['id'];

            $inCart = false; // Giả sử chưa có trong giỏ hàng
            foreach ($_SESSION['cart'] as &$sp) { // Phải truyền tham biến
                if ($sp['product_id'] == $book_id) { // Đã có SP trong giỏ hàng -> Tăng số lượng
                    updateQuantity($cart_id, $book_id, $sp['quantity'], '+');
                    $sp['quantity']++;
                    $inCart = true;
                    break;
                }
            }

            if (!$inCart) { // Chưa có sản phẩm trong giỏ hàng -> Thêm vào giỏ hàng
                insertCartDetail($cart_id, $book_id);
                $_SESSION['cart'] = cartDetail_getByUserId($_SESSION['user']['id']);
            }
        } else {
            header('Location: ?ctrl=user&view=login');
            exit();
        }

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
        removeFromCartDetail($cart_id, $book_id);
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
        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $index = $_GET['index'];
        $book_id = $_GET['id'];
        $cart = cart_getByUserId_Basic($user_id);
        $cart_id = $cart['id'];
        updateQuantity($cart_id, $book_id, $_SESSION['cart'][$index]['quantity'], '+');
        $_SESSION['cart'][$index]['quantity']++;
        header('Location: ?ctrl=cart&view=view');
        break;

    case 'subQuantity':
        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $index = $_GET['index'];
        $book_id = $_GET['id'];
        $cart = cart_getByUserId_Basic($user_id);
        $cart_id = $cart['id'];
        updateQuantity($cart_id, $book_id, $_SESSION['cart'][$index]['quantity'], '-');
        if ($_SESSION['cart'][$index]['quantity'] == 0) {
            array_splice($_SESSION['cart'], $index, 1);
        }
        header('Location: ?ctrl=cart&view=view');
        break;

    case 'delivery_address':
        // Xử lý dữ liệu

        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $cartItems = cartDetail_getByUserId($user_id);
        // print_r($cartItems);

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     echo "Success";
        // }

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart_delivery_address.php';
        include_once 'views/t_footer.php';
        break;
    case 'payment':
        // Xử lý dữ liệu

        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $cartItems = cartDetail_getByUserId($user_id);

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart_payment.php';
        include_once 'views/t_footer.php';
        break;
    default:
        # code...
        break;
}