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

  $sql = "SELECT id, name, email, role FROM user";
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

// var_dump($products);  

?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <div class="admin-container">
  <?php
    include('../sidebar.php')
   ?>

    <!-- Main content -->
    <main class="main-content">
      <h1>📦 Danh sách Người dùng</h1>
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>email</th>
            <th>role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             foreach($users as $user) {
          ?>
            <tr>
              <td><?= $user['id']?> </td>
              <td><?= $user['name']?></td>
              <td><?= $user['email']?></td>
              <td><?= $user['role']?></td>
              <td>
                <button class="btn-edit">✏️ Sửa</button>
                <a href="user/deleteSanPham.php?id=<?= $user['id'] ?>"><button class="btn-delete">🗑️ Xóa</button> </a>
              </td>
            </tr>

          <?php 
             }
          ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
