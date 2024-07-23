<?php
// Lấy dữ liệu liên quan đến comment cho sản phẩm
include_once 'pdo.php';

function comment_add($user_id, $book_id, $comment_content)
{
    return pdo_execute("INSERT INTO comment(`user_id`, `book_id`, `comment_content`) VALUES
    ($user_id, $book_id, '$comment_content')");
}

function comment_getByProductId($book_id)
{
    return pdo_query("SELECT * FROM comment cmt JOIN accounts acc ON cmt.user_id = acc.id 
    WHERE book_id=$book_id
    ORDER BY comment_time DESC
    ");
}
