<?php 

// 1. bắt dữ liệu bên giao diện gửi về
// 2. lưu dữ liệu nhận được vào database
//1 
$data = $_POST;
var_dump($data);
//2
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milk-sale";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO products (name, mill_code, price)
VALUES ('$data[tenSua]', '$data[maSua]', '$data[donGia]')";

echo $sql;

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location: /btaplon/admin/");
  die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>