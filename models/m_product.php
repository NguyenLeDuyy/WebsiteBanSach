<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';
function product_getAll()
{
    return pdo_query("SELECT * FROM books");
}

function product_getByCategory($category_id)
{
    return pdo_query("SELECT * FROM books WHERE category_id = $category_id");
}

function product_getById($product_id)
{
    return pdo_query_one("SELECT * FROM books WHERE id = $product_id");
}
