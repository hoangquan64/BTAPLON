<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Giỏ hàng</title>
  <link rel="stylesheet" href="giohang.css">
</head>
<body>
<?php 
      if (isset($_COOKIE['cart'])) {
        $carts = json_decode($_COOKIE['cart']);  // Get the number of items in the cart

      } else {
        $carts = [];
      }
      ?>
  <div class="cart-container">
    <h2>🛒 Giỏ hàng của bạn</h2>
    <table class="cart-table">
      <thead>
        <tr>
          <th>Sản phẩm</th>
          <th>Giá</th>
          <th>Số lượng</th>
          <th>Tạm tính</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $total = 0;
          if(count($carts) > 0) {
            foreach($carts as $item) {
              $total += $item->price * $item->quantity;
              ?>

                <tr>
                  <td><?= $item->name ?></td>
                  <td><?= $item->price ?></td>
                  <td><?= $item->quantity ?></td>
                  <td><?= $item->price * $item->quantity ?></td>
                </tr>
              <?php
            }
          }
        ?>
      </tbody>
    </table>

    <div class="cart-footer">
      <p><strong>Tổng cộng:</strong> <span class="total-price"><?= $total ?></span></p>
      <a href="taodonhang.php"><button class="checkout-btn">✅ Thanh toán</button></a>
    </div>
  </div>
</body>
</html>
