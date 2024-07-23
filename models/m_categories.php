<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';
function categories_getAll()
{
    return pdo_query("SELECT * FROM categories");
}

function categories_getById($category_id)
{
    return pdo_query_one("SELECT * FROM categories WHERE id=$category_id");
}
