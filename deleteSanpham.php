<?php

var_dump($_GET);

$id = $_GET['id'];

//  show data
//var_dump($_POST);

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

// Sql để tạo user trong database
$sql = "DELETE FROM products WHERE id = $id;";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: /btaplon/admin");
  die();
} else {
  echo "xoas không thành công";
}