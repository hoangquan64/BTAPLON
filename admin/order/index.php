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

  $sql = "SELECT id, customer_name, phone, address FROM orders";
  $result = mysqli_query($conn, $sql);

  $orders = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($orders, $row);
   // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
  }
} else {
  echo "";
}

function getSanPham($conn, $orderId) {
  $sqlRaw = "SELECT od.id, od.order_id, od.product_id, od.quantity, od.price , p.name as product_name 
  FROM order_details od 
  inner join products p on p.id = od.product_id 
  where od.order_id  = $orderId
  ";

  $result = mysqli_query($conn, $sqlRaw);

  $products = [];

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      array_push($products, $row);
    // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
    }
  } else {
    
  }

  return $products;
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
      <h1>📦 Danh sách Đơn hàng</h1>
      <table class="admin-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Danh sách sản phẩm</th>
            <th>Tổng tiền</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             foreach($orders as $order) {
          ?>
            <tr>
              <td><?= $order['id']?> </td>
              <td>
                <?= $order['customer_name']?> <br>
                <?= $order['address']?> <br>
                <?= $order['phone']?> <br>
              </td>
              <td>

                <!-- danh sach san pham o day -->
                <?php 
                  $total = 0;
                  $products = getSanPham($conn, $order['id']);

                  foreach($products as $product) {
                    $total += $product['price'] * $product['quantity'];
                    ?>
                      <p><span>Tên: <?= $product['product_name'] ?> </span> | Giá : <span><?= $product['price'] ?></span> | Số lượng :<span><?= $product['quantity'] ?></span></p> 

                    <?php
                  }
                ?>
              </td>
              <td><?= $total ?></td>
              <td>
                <button class="btn-edit">✏️ Sửa</button>
                <a href="order/deleteSanPham.php?id=<?= $order['id'] ?>"><button class="btn-delete">🗑️ Xóa</button> </a>
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
