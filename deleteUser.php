<?php

var_dump($_GET);

$id = $_GET['user_id'];

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
$sql = "DELETE FROM user WHERE id = $id;";

echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: http://baitaplon.test/btaplon/thongtinkhachhang.php");
  die();
} else {
  echo "xoas không thành công";
}
// else if ($_POST['id']) {
//     $data = $_POST;
//     $sql = "UPDATE products SET name='" . $data['txtName'] . "'" .
//     ", passwokd='" . $data['txtPass'] . "'" .
//     ",email='" . $data['txtEmail'] . "'" .
//     " WHERE id=". $data['id'];

//     echo $sql;
 
//     if (mysqli_query($conn, $sql)) {
//       echo "New record created successfully";
//       header("Location: http://baitaplon.test/btaplon/login.php");
//         die();
//     } else {
//       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
//   } 
  
?>

