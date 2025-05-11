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

// Sql để tạo user trong database
$sql = "SELECT id, name, email , role
FROM user
WHERE  name = '$_POST[txtName]'
AND password = '$_POST[txtPass]' ";

$result = mysqli_query($conn, $sql);

$user = null;

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $user = $row;
   // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
  }
} else {
  echo "";
}

setcookie('user', json_encode($user), time() + (86400 * 30), '/');

// check role user
if($user['role'] === 'admin') {
  header("Location: http://baitaplon.test/btaplon/admin");
  die();
}

header("Location: http://baitaplon.test/btaplon");
die();

var_dump($user);

