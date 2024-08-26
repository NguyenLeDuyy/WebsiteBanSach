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
        include_once 'views/t_header_home_page.php';
        include_once 'views/t_aside.php';
        include_once 'views/v_product_category.php';
        include_once 'views/t_footer.php';
        # code...
        break;
    case 'detail':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $sp = product_getById($_GET['id']);

        if ($sp['image_urls'] != null)
            $other_images = json_decode($sp['image_urls'], true);
        else
            $other_images = ["unUpdate.svg", "unUpdate.svg"];
        // print_r($other_images);

        include_once 'models/m_comment.php';
        $dsBL = comment_getByProductId($_GET['id']);

        // Hiển thị dữ liệu
        include_once 'views/t_header_product_detail.php';
        include_once 'views/v_product_detail.php';
        include_once 'views/t_footer.php';
        # code...
        break;

    case 'all':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $dsSP = product_getAll();

        // Hiển thị dữ liệu
        include_once 'views/t_header_home_page.php';
        include_once 'views/t_aside.php';
        include_once 'views/v_product_all.php';
        include_once 'views/t_footer.php';
        break;

    case 'productAdmin':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        include_once 'models/m_categories.php';
        $dsSP = product_getAllForAdmin();
        $categories = categories_getAll();

        // Hiển thị dữ liệu
        include_once 'views/t_headerAdmin.php';
        include_once 'views/t_asideAdmin.php';
        include_once 'views/t_icon_ShowHideSideBarAdmin.php';
        include_once 'views/v_product_admin.php';
        include_once 'views/t_modalAddProduct.php';
        include_once 'views/t_footerAdmin.php';
        break;

    case 'updateStatus':
        // Kiểm tra đã đăng nhập và là admin
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin')) {
            header('Location: index.php');
            exit;
        }

        // Xử lý dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book_id = $_POST['book_id'];
            $status = $_POST['status'];

            // Gọi hàm cập nhật trạng thái đơn hàng
            include_once 'models/m_product.php';
            product_updateStatus($book_id, $status);
        }

        // Chuyển hướng về trang quản lý đơn hàng
        header('Location: ?ctrl=product&view=productAdmin');
        exit;

    case 'addProductFromAdmin':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];
            $discounted_price = $_POST['discounted_price'] ?? null;
            $published_date = $_POST['published_date'];
            $description = $_POST['description'] ?? null;
            $discount_percentage = $_POST['discount_percentage'] ?? null;
            $category_id = $_POST['category_id'];
            $cover_image = '';
            $image_urls = '';

            settype($category_id, "int");
            settype($price, "int");
            settype($discounted_price, "int");

            print_r($_FILES["cover_image"]);
            // Handle cover image upload
            if ($_FILES["cover_image"]['error'] == 0) {
                move_uploaded_file($_FILES['cover_image']['tmp_name'], "public/img/All/" . $_FILES['cover_image']['name']);
                $cover_image = $_FILES['cover_image']['name'];
            }

            // Handle additional images upload
            // if (isset($_FILES['image_urls']) && !empty($_FILES['image_urls']['name'][0])) {
            //     $image_urls_array = [];
            //     foreach ($_FILES['image_urls']['name'] as $key => $name) {
            //         $target_file = $target_dir . basename($name);
            //         if (move_uploaded_file($_FILES["image_urls"]["tmp_name"][$key], "public/img/All/" . $_FILES['avatar']['name'])) {
            //             $image_urls_array[] = basename($name);
            //         } else {
            //             $message = "Sorry, there was an error uploading file $name.";
            //         }
            //     }
            //     $image_urls = json_encode($image_urls_array);
            // } else {
            //     $image_urls = json_encode([]); // Set as empty array if no images uploaded
            // }

            include_once 'models/m_product.php';
            product_AddFromAdmin($title, $author, $price, $discounted_price, $published_date, $description, $cover_image, $discount_percentage, $category_id);
        }
        header('Location: ?ctrl=product&view=productAdmin');
        break;

    case 'productShowHideAdmin':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        $product_id = $_GET['id'];
        product_updateShowHide($product_id);

        // Hiển thị ra view
        header('Location: ?ctrl=product&view=productAdmin');
        break;

    case 'productUpdateAdmin':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        include_once 'models/m_categories.php';
        $book_id = $_GET['id'];
        $book = product_getById($book_id);
        $categories = categories_getAll();

        // Hiển thị ra view
        include_once 'views/t_headerAdmin.php';
        include_once 'views/t_asideAdmin.php';
        include_once 'views/t_icon_ShowHideSideBarAdmin.php';
        include_once 'views/v_product_updateAdmin.php';
        include_once 'views/t_footerAdmin.php';

        break;

    case 'updateProductFromAdminHanlde':
        // Xử lý dữ liệu
        include_once 'models/m_product.php';
        include_once 'models/m_categories.php';
        $book_id = $_GET['id'];
        $book = product_getById($book_id);
        $categories = categories_getAll();


        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];
        $discounted_price = $_POST['discounted_price'] ?? null;
        $published_date = $_POST['published_date'];
        $description = $_POST['description'] ?? null;
        $discount_percentage = $_POST['discount_percentage'] ?? null;
        $category_id = $_POST['category_id'];
        $status = $_POST['status'];
        $cover_image = $book['cover_image']; // Giữ nguyên giá trị hiện tại của cover_image

        settype($category_id, "int");
        settype($price, "int");
        settype($discounted_price, "int");

        // Handle cover image upload
        if ($_FILES["cover_image"]['error'] == 0) {
            move_uploaded_file($_FILES['cover_image']['tmp_name'], "public/img/All/" . $_FILES['cover_image']['name']);
            $cover_image = $_FILES['cover_image']['name'];
        }

        product_updateInfo($book_id, $title, $author, $price, $discounted_price, $published_date, $description, $cover_image, $discount_percentage, $category_id, $status);

        header('Location: ?ctrl=product&view=productAdmin');
        break;

    default:
        # code...
        break;
}