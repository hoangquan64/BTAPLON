<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milk-sale";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Lấy thông tin sản phẩm theo ID
$productId = $_GET['id'];
$quantity = $_GET['quantity'] ?? 1;  // Mặc định số lượng là 1 nếu không có

// Truy vấn sản phẩm từ cơ sở dữ liệu
$sql = "SELECT id, name, price, image FROM products WHERE id = $productId LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);

    // Lấy giỏ hàng từ cookie (nếu có)
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $found = false;
    foreach ($cart as &$item) {
        if ($item['id'] == $product['id']) {
            $item['quantity'] += $quantity; // Cộng thêm số lượng nếu sản phẩm đã có trong giỏ
            $found = true;
            break;
        }
    }

    // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ
    if (!$found) {
        $cart[] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => $quantity
        ];
    }

    // Lưu lại giỏ hàng vào cookie (thời gian hết hạn 30 ngày)
    setcookie('cart', json_encode($cart), time() + (86400 * 30), '/'); 
    header("Location: http://baitaplon.test/btaplon/sanpham.php"); // Chuyển hướng về trang giỏ hàng
    exit();
} else {
    echo "Không tìm thấy sản phẩm!";
}
?>
