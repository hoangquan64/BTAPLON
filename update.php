
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Cập Nhật Thông Tin Khách Hàng</title>
  <link rel="stylesheet" href="update.css">
</head>
<body>
  <div class="form-container">
    <h2>THÊM THÔNG TIN KHÁCH HÀNG</h2>
    <form action="themsuathongtinkhachhang" method="POST">
      <label for="maKH">Mã khách hàng:</label>
      <input type="text" id="maKH" name="maKH" value="" readonly>

      <label for="tenKH">Tên khách hàng:</label>
      <input type="text" id="tenKH" name="tenKH" value="" required>

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
      <input type="email" id="email" name="email" value="" required>

      <button type="submit">Cập nhật</button>
    </form>
  </div>
</body>
</html>