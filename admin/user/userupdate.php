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
    
      $sql = "SELECT id, name,email FROM user WHERE id = $id LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $user = null;
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        ($user  = $row);
      // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
      }
    } else {
      echo "";
    } 
  } else if ($_POST['id']) {
    $data = $_POST;
    $sql = "UPDATE users SET name='" . $data['tenKH'] . "'" .
    ", email='" . $data['email'] . "'" .
    " WHERE id=". $data['id'];

    echo $sql;
    

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: /btaplon/thongtinkhachhang.php");
        die();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    header("Location: /btaplon/thongtinkhachhang.php");
    die();
  }
  ?>
  <!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Cập Nhật Thông Tin Khách Hàng</title>
  <link rel="stylesheet" href="update.css">
</head>
<body>
  <div class="form-container">
    <h2>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h2>
    <form action="userupdate" method="POST">
      <label for="maKH">Mã khách hàng:</label>
      <input type="text" id="maKH" name="maKH" value="<?=$user['id']?>" readonly>

      <label for="tenKH">Tên khách hàng:</label>
      <input type="text" id="tenKH" name="tenKH" value="<?=$user['name']?>" required>

      <label for="gioiTinh">Giới tính:</label>
      <select id="gioiTinh" name="gioiTinh">
        <option value="Nam">Nam</option>
        <option value="Nữ" selected>Nữ</option>
      </select>

      <label for="diaChi">Địa chỉ:</label>
      <input type="text" id="diaChi" name="diaChi" value="A21 Nguyễn Quanh Gò Vấp" required>

      <label for="sdt">Số điện thoại:</label>
      <input type="text" id="sdt" name="sdt" value="98471245" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?=$user['email']?>" required>

      <button type="submit">Cập nhật</button>
    </form>
  </div>
</body>
</html>