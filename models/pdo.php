<?php
// Xây dựng các hàm cơ bản để kết nối đến cơ sở dữ liệu 
$conn;
function connect()
{
    global $conn; // Dòng trong hàm sẽ lưu cho biến bên ngoài
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=book_store;charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function pdo_query($sql)
{
    global $conn;
    connect(); // Gọi trực tiếp hàm connect
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function pdo_query_one($sql)
{
    global $conn;
    connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function pdo_execute($sql)
{
    global $conn;
    connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $conn->lastInsertId();
}