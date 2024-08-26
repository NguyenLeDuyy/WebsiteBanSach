<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';

function product_countAll()
{
    return pdo_query_one("SELECT count(*) FROM books");
}

function product_getAll()
{
    return pdo_query("SELECT * FROM books WHERE AnHien='1' ");
}

function product_getAllForAdmin()
{
    return pdo_query("SELECT * FROM books ORDER BY id DESC");
}

function product_getByCategory($category_id)
{
    return pdo_query("SELECT * FROM books WHERE category_id = $category_id AND AnHien='1' ");
}

function product_getByCategoryWithLimit($category_id, $limit = 8)
{
    return pdo_query("SELECT * FROM books WHERE category_id = $category_id AND AnHien='1' LIMIT $limit");
}

function product_getById($product_id)
{
    return pdo_query_one("SELECT * FROM books WHERE id = $product_id");
}

function product_getFeatured($limit = 8)
{
    return pdo_query("SELECT * FROM books WHERE discounted_price IS NOT NULL AND AnHien='1' ORDER BY discounted_price DESC LIMIT $limit");
}

function product_updateStatus($product_id, $status)
{
    pdo_execute("UPDATE books SET status='$status' WHERE id=$product_id");
}

function product_AddFromAdmin($title, $author, $price, $discounted_price, $published_date, $description, $cover_image, $discount_percentage, $category_id, $status = 'Còn hàng', $AnHien = '1')
{
    $sql = "INSERT INTO books (`title`, `author`, `price`, `discounted_price`, `published_date`, `description`, `cover_image`, `discount_percentage`, `category_id`, `status`, `AnHien`) 
            VALUES (:title, :author, :price, :discounted_price, :published_date, :description, :cover_image, :discount_percentage, :category_id, :status, :AnHien)";

    pdo_execute($sql, [
        ':title' => $title,
        ':author' => $author,
        ':price' => $price,
        ':discounted_price' => $discounted_price,
        ':published_date' => $published_date,
        ':description' => $description,
        ':cover_image' => $cover_image,
        ':discount_percentage' => $discount_percentage,
        ':category_id' => $category_id,
        ':status' => $status,
        ':AnHien' => $AnHien
    ]);
}

function product_updateShowHide($product_id)
{
    pdo_execute("UPDATE books SET AnHien = IF(AnHien='1', '0', '1') WHERE id=$product_id");
}
