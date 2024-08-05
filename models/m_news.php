<?php
// Lấy dữ liệu liên quan đến sản phẩm 
include_once 'pdo.php';
function news_getAll()
{
    return pdo_query("SELECT * FROM news");
}

function news_getById($new_id)
{
    return pdo_query_one("SELECT * FROM news WHERE id=$new_id");
}
