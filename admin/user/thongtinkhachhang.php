<?php 
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

  $sql = "SELECT id, name, email FROM user";
  $result = mysqli_query($conn, $sql);

  $users = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($users, $row);
   // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
  }
} else {
  echo "";
}

//var_dump($users);  

?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thông Tin Khách Hàng</title>
  <link rel="stylesheet" href="thongtinkhachhang.css">
</head>
<body>
  <div class="container">
    <h2>THÔNG TIN KHÁCH HÀNG</h2>
    <table>
      <thead>
        <tr>
          <th>Mã KH</th>
          <th>Tên KH</th>
          <th>Giới tính</th>
          <th>Địa chỉ</th>
          <th>SĐT</th>
          <th>Email</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($users as $user) {

      ?>
 <tr>
          <td><?=$user['id']?></td>
          <td><?=$user['name']?></td>
          <td>Nữ</td>
          <td>A21 Nguyễn Quanh Gò Vấp</td>
          <td>98471245</td>
          <td><?=$user['email']?></td>
          <td>
            <a href="http://baitaplon.test/btaplon/addupdate.php?id=<?=$user['id']?>"><button class="edit">Sửa</button></a>
            <a href="deleteUser.php?user_id=<?=$user['id']?>"><button class="delete">Xóa</button></a>
          </td>


        
        </tr>
       

      <?php

        }
        ?>
       
      </tbody>
    </table>
  </div>
</body>
</html>