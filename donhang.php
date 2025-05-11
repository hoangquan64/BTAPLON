<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tạo đơn hàng</title>
  <link rel="stylesheet" href="donhang.css">
</head>
<body>
  <div class="form-container">
    <h1>Tạo đơn hàng mới</h1>
    <form action="xu_ly_don_hang.php" method="POST">
      <label for="ten_khach">👤 Tên khách hàng</label>
      <input type="text" id="ten_khach" name="ten_khach" required>

      <label for="so_dien_thoai">📞 Số điện thoại</label>
      <input type="tel" id="so_dien_thoai" name="so_dien_thoai" required>

      <label for="dia_chi">📍 Địa chỉ giao hàng</label>
      <textarea id="dia_chi" name="dia_chi" rows="3" required></textarea>

      <label for="san_pham">📦 Sản phẩm</label>
      <select id="san_pham" name="san_pham" required>
        <option value="">-- Chọn sản phẩm --</option>
        <option value="sp001">Sản phẩm 1</option>
        <option value="sp002">Sản phẩm 2</option>
        <option value="sp003">Sản phẩm 3</option>
      </select>

      <label for="so_luong">🔢 Số lượng</label>
      <input type="number" id="so_luong" name="so_luong" min="1" value="1" required>

      <button type="submit">📝 Tạo đơn hàng</button>
    </form>
  </div>
</body>
</html>
