<?php

function handleAddToCart($user_id, $book_id)
{
    // Kiểm tra xem người dùng đã có giỏ hàng nào chưa
    $cart = cart_getByUserId_Basic($user_id);

    if (!$cart) {
        // Nếu chưa có giỏ hàng nào, tạo một giỏ hàng mới
        $cart_id = addNewCart($user_id, $book_id);
    } else {
        // Nếu đã có giỏ hàng, kiểm tra trạng thái của giỏ hàng
        if ($cart['cart_status'] == 'Pending') {
            // Nếu giỏ hàng đang ở trạng thái 'Pending', tạo một giỏ hàng mới
            $cart_id = addNewCart($user_id, $book_id);
        } else {
            // Nếu giỏ hàng đang ở trạng thái 'active', thêm sản phẩm vào giỏ hàng đó
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
                insertCartDetailWithQuantity($cart_id, $book_id, 1);
            }
        }
    }

    // Cập nhật lại giỏ hàng trong session
    $_SESSION['cart'] = cartDetail_getByUserId($user_id);
}

function create_temp_user()
{
    $tempUserID = currentIdUser() + 1;
    $email = "temp_user_" . $tempUserID . "@example.com";
    $user = user_register("", $email, "");
    return user_getById($user['id']);
}

function get_cart_for_user($user_id)
{
    $_SESSION['cart'] = cartDetail_getByUserId($user_id);
    return cart_getByUserId_Basic($user_id);
}

switch ($_GET['view']) {
    case 'view':
        // Xử lý dữ liệu
        // unset($_SESSION['cart']);
        // unset($_SESSION['user']);
        // print_r($_SESSION['cart']);
        include_once 'models/m_cart.php';

        // $cart_id = $cart['id'];
        // echo "Cart id: " . $cart_id . "<br>";
        // include_once 'models/m_product.php';

        if (isset($_SESSION['user'])) {
            if (!isset($_SESSION['user']['id'])) {
                include_once 'models/m_user.php';
                $tempUser = create_temp_user();
                $_SESSION['user'] = $tempUser;
            }
            $user_id = $_SESSION['user']['id'];
        } else {
            include_once 'models/m_user.php';
            $tempUser = create_temp_user();
            $_SESSION['user'] = $tempUser;
            $user_id = $_SESSION['user']['id'];
        }

        $_SESSION['cart'] = cartDetail_getByUserId($user_id);
        // print_r($_SESSION['user']);

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/v_cart.php';
        include_once 'views/t_footer.php';

        break;

    case 'addToCartOnHome':
        // Xử lý dữ liệu
        include_once 'models/m_cart.php';

        if (isset($_SESSION['user'])) {
            if (!isset($_SESSION['user']['id'])) {
                include_once 'models/m_user.php';
                $tempUser = create_temp_user();
                $_SESSION['user'] = $tempUser;
            }
            $user_id = $_SESSION['user']['id'];
        } else {
            include_once 'models/m_user.php';
            $tempUser = create_temp_user();
            $_SESSION['user'] = $tempUser;
            $user_id = $_SESSION['user']['id'];
        }

        $_SESSION['cart'] = cartDetail_getByUserId($user_id);
        $book_id = $_GET['id'];

        handleAddToCart($user_id, $book_id);

        header('Location: ?ctrl=page&view=home');

        break;

    case 'addToCart':
        // Xử lý dữ liệu
        include_once 'models/m_cart.php';

        if (isset($_SESSION['user'])) {
            if (!isset($_SESSION['user']['id'])) {
                include_once 'models/m_user.php';
                $tempUser = create_temp_user();
                $_SESSION['user'] = $tempUser;
            }
            $user_id = $_SESSION['user']['id'];
        } else {
            include_once 'models/m_user.php';
            $tempUser = create_temp_user();
            $_SESSION['user'] = $tempUser;
            $user_id = $_SESSION['user']['id'];
        }

        $_SESSION['cart'] = cartDetail_getByUserId($user_id);
        $book_id = $_GET['id'];

        handleAddToCart(
            $user_id,
            $book_id
        );

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

            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $ward = $_POST['ward'];
            user_updateInfo($user_id, $fullname, $address, $phone_number, $email, $city, $district, $ward);
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
