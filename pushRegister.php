<?php

echo 'quan muon luu user o day';
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
$sql = "INSERT INTO user 
(name, password, email)  
VALUES ('$_POST[txtName]', '$_POST[txtRePass]', '$_POST[txtEmail]')";

echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: http://baitaplon.test/btaplon/login.php");
  die();
} else {
  echo "tạo không thành công";
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

