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

  $sql = "SELECT id, name, price, image FROM products";
  $result = mysqli_query($conn, $sql);

  $products = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($products, $row);
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
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <div class="admin-container">
   <?php
    include('../sidebar.php')
   ?>

    <!-- Main content -->
    <main class="main-content">
      <h1>📦 Danh sách sản phẩm</h1>
      <a href="product/themsuamoi.php"><button>THeme san pham</button></a>
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             foreach($products as $product) {
          ?>
            <tr>
              <td><?= $product['id']?> </td>
              <td><?= $product['name']?></td>
              <td><?= $product['price']?></td>
              <td>Áo</td>
              <td>Còn hàng</td>
              <td>
                <button class="btn-edit">✏️ Sửa</button>
                <a href="product/deleteSanPham.php?id=<?= $product['id'] ?>"><button class="btn-delete">🗑️ Xóa</button> </a>
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
