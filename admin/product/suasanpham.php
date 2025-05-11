  <?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "milk-sale";

  $id = $_GET['id'] ?? null;

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($id) {
    
      $sql = "SELECT id, mill_code, name, price, image FROM products WHERE id = $id LIMIT 1";
      $result = mysqli_query($conn, $sql);
    
      $product = null;
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        ($product  = $row);
      // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
      }
    } else {
      echo "";
    } 
  } else if ($_POST['id']) {
    $data = $_POST;
    $sql = "UPDATE products SET name='" . $data['tenSua'] . "'" .
    ", mill_code='" . $data['maSua'] . "'" .
    " WHERE id=". $data['id'];

    echo $sql;
    

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: http://baitaplon.test/btaplon/admin");
        die();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    header("Location: http://baitaplon.test/btaplon/admin");
    die();
  }
  
?> 
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm Sữa Mới</title>
  <link rel="stylesheet" href="themsuamoi.css">
</head>
<body>
  <div class="form-container">
    <h2>THÊM SỮA MỚI</h2>
    <form action="suasanpham.php" method="POST" enctype="multipart/form-data">
      <label for="maSua">Mã sữa:</label>
      <input type="text" id="maSua" name="maSua" required value="<?= $product['mill_code']?>">
      <input type="hidden" id="id" name="id" required value="<?= $id ?>">

      <label for="tenSua">Tên sữa:</label>
      <input type="text" id="tenSua" name="tenSua" value="<?= $product['name']?>">

      <label for="hangSua">Hãng sữa:</label>
      <input type="text" id="hangSua" name="hangSua" >

      <label for="loaiSua">Loại sữa:</label>
      <select id="loaiSua" name="loaiSua">
        <option value="Sữa bột">Sữa bột</option>
        <option value="Sữa nước">Sữa nước</option>
      </select>

      <label for="trongLuong">Trọng lượng (gr hoặc ml):</label>
      <input type="number" id="trongLuong" name="trongLuong" >

      <label for="donGia">Đơn giá (VNĐ):</label>
      <input type="number" id="donGia" name="donGia" >

      <label for="thanhPhan">Thành phần dinh dưỡng:</label>
      <textarea id="thanhPhan" name="thanhPhan" rows="3"></textarea>

      <label for="loiIch">Lợi ích:</label>
      <textarea id="loiIch" name="loiIch" rows="3"></textarea>

      <label for="hinh">Hình ảnh:</label>
      <input type="file" id="hinh" name="hinh">

      <button type="submit">Thêm mới</button>
    </form>
  </div>
</body>
</html>