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

  $sql = "SELECT id, mill_code, name, price, image FROM products";
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
    <title>Thông Tin Sữa</title>
    <link rel="stylesheet" href="thongtin.css">
</head>
<body>

    <h2 style="text-align: center; color: #1890ff;">THÔNG TIN CÁC LOẠI SỮA</h2>

    <table class="sua-table">
    <thead>
            <tr>
                <th>Mã sữa</th>
                <th>Tên sữa</th>
                <th>Hãng sữa</th>
                <th>Loại sữa</th>
                <th>Trọng lượng</th>
                <th>Đơn giá</th>
                <th>Thành phần</th>
                <th>Lợi ích</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
        foreach($products as $product)
        {
        ?>
            <tr>
                <td><?=$product['mill_code'] ?></td>
                <td><?=$product['name'] ?></td>
                <td>TH TRUE MILK</td>
                <td>Sữa bột</td>
                <td>800gr</td>
                <td><?=$product['price'] ?></td>
                <td>Vitamin, khoáng chất, canxi</td>
                <td>Phát triển chiều cao và trí tuệ</td>
                <td><img src="<?=$product['image'] ?>" alt="sua" width="60"></td>
                <td>
                  <a href="/btaplon/suasanpham.php?id=<?=$product['id']?>">

                    <button class="action-btn btn-edit">Sửa</button>
                  </a>
                   <a href="deleteSanpham.php?product_id=<?=$product['id']?>"> <button class="action-btn btn-delete">Xoá</button></a>
                </td>
            </tr>
            <!-- Thêm dòng khác nếu cần -->
            
            <?php
        }
        ?>
        </tbody> 
       
    </table>

</body>
</html>