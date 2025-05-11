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
    <form action="them_sua.php" method="POST" enctype="multipart/form-data">
      <label for="maSua">Mã sữa:</label>
      <input type="text" id="maSua" name="maSua" required>

      <label for="tenSua">Tên sữa:</label>
      <input type="text" id="tenSua" name="tenSua" >

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