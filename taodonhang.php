<?php

// khai báo thông tin cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milk-sale";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function createOrder($conn) {

    if(!isset($_COOKIE['user'])) {
        echo 'hãy đăng nhập trước khi đặt hàng';
    }

    $user = json_decode($_COOKIE['user']);

    $sql = "INSERT INTO orders 
    (customer_name, address, phone)  
    VALUES ('$user->name', null, null)";
    
    $last_id = null;
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    return $last_id;
}

function createOrderDetail($conn, $idOrder, $item) {

    $sql = "INSERT INTO order_details
    (order_id, product_id, quantity, price)  
    VALUES ('$idOrder', $item->id, $item->quantity, $item->price)";
    
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

// Sql để tạo user trong database

if (isset($_COOKIE['cart'])) {
    $carts = json_decode($_COOKIE['cart']);  // Get the number of items in the cart

    $orderId = createOrder($conn);
    foreach($carts as $item) {
        createOrderDetail($conn, $orderId, $item);
    }

    setcookie('cart', null, time() - 3600, '/');
    header("Location: /btaplon/giohang.php");
    die();
    //{ ["id"]=> string(1) "3" ["name"]=> string(3) "234" ["price"]=> string(3) "234" ["image"]=> string(0) "" ["quantity"]=> int(3) } 
    
    // yêu cầu đăng nhập trước khi đặt hàng


} 