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
