<?php

switch ($_GET['view']) {
    case 'view':
        // Xử lý dữ liệu
        // unset($_SESSION['cart']);
        // print_r($_SESSION['cart']);
        include_once 'models/m_cart.php';

        // $cart_id = $cart['id'];
        // echo "Cart id: " . $cart_id . "<br>";
        // include_once 'models/m_product.php';

        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $_SESSION['cart'] = cartDetail_getByUserId($user_id);
            $cart = cart_getByUserId_Basic($user_id);
        } else {
            $_SESSION['user'] = [
                "fullname" => "",
                "username" => "",
                "password" => "",
                "email" => "",
                "phone" => "",
            ];

            $user_id = $_SESSION['user']['id'];
            $_SESSION['cart'] = cartDetail_getByUserId($user_id);
            $cart = cart_getByUserId_Basic($user_id);
        }

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart.php';
        include_once 'views/t_footer.php';

        break;

    case 'addToCartOnHome':
        include_once 'models/m_cart.php';

        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $book_id = $_GET['id'];
            handleAddToCart($user_id, $book_id);
        } else {
            $_SESSION['user'] = [
                "fullname" => "",
                "username" => "",
                "password" => "",
                "email" => "",
                "phone" => "",
            ];

            $user_id = $_SESSION['user']['id'];
            $book_id = $_GET['id'];
            handleAddToCart($user_id, $book_id);
        }

        header('Location: ?ctrl=page&view=home');

        break;

    case 'addToCart':
        // Xử lý dữ liệu
        include_once 'models/m_cart.php';

        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $book_id = $_GET['id'];
            handleAddToCart($user_id, $book_id);
        } else {
            $_SESSION['user'] = [
                "fullname" => "",
                "username" => "",
                "password" => "",
                "email" => "",
                "phone" => "",
            ];

            $user_id = $_SESSION['user']['id'];
            $book_id = $_GET['id'];
            handleAddToCart($user_id, $book_id);
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
        $cart = cart_getByUserId_Basic($user_id);
        // print_r($cartItems);

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart_delivery_address.php';
        include_once 'views/t_footer.php';
        break;
    case 'payment':
        // Xử lý dữ liệu

        include_once 'models/m_cart.php';
        $user_id = $_SESSION['user']['id'];
        $cart = cart_getByUserId_Basic($user_id);
        // print_r($cart);
        // $cart_id = $cart['id'];
        $cartItems = cartDetail_getByUserId($user_id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include_once 'models/m_user.php';
            if ($user_id == "") {
                $_SESSION['user'] = user_registerNoLogin($_POST['fullname'], $_POST['phone'], $_POST['email'], $_POST['address']);
            } else {
                $fullname = $_SESSION['user']['fullname'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone'];
                $email = $_POST['email'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                user_updateInfo($user_id, $fullname, $address, $phone_number, $email, $city, $district, $ward);
            }

            if (isset($_POST['tongtien'])) echo "Có tổng tiền";
            else "Không có tổng tiền";
        }

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart_payment.php';
        include_once 'views/t_footer.php';
        break;
    default:
        # code...
        break;
}
