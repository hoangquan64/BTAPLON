<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milk-sale";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Lấy giỏ hàng từ cookie
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
$totalPrice = 0;

// Kiểm tra nếu có yêu cầu xóa sản phẩm
if (isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    // Loại bỏ sản phẩm có id tương ứng
    foreach ($cart as $key => $item) {
        if ($item['id'] == $removeId) {
            unset($cart[$key]);
        }
    }
    // Cập nhật lại cookie giỏ hàng
    setcookie('cart', json_encode(array_values($cart)), time() + (86400 * 30), '/');
    header("Location: giohang.php"); // Tải lại trang giỏ hàng
    exit();
}

// Kiểm tra nếu có thay đổi số lượng sản phẩm
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newQuantity = $_POST['quantity'];

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    foreach ($cart as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] = $newQuantity;
        }

    // Cập nhật lại cookie giỏ hàng
    setcookie('cart', json_encode($cart), time() + (86400 * 30), '/');
    header("Location: giohang.php"); // Tải lại trang giỏ hàng
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
</head>
<body>
    <h1>Giỏ Hàng</h1>

    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($cart) > 0): ?>
                <?php foreach ($cart as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <form method="post" action="giohang.php">
                            <td>
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" class="quantity" min="1" required>
                            </td>
                            <td><?= $item['price'] ?> VND</td>
                            <td><?= $item['quantity'] * $item['price'] ?> VND</td>
                            <td>
                                <button type="submit" name="update">Cập nhật</button>
                                <a href="giohang.php?remove=<?= $item['id'] ?>"><button type="button">Xóa</button></a>
                            </td>
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                        </form>
                    </tr>
                    <?php $totalPrice += $item['quantity'] * $item['price']; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Giỏ hàng trống!</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div>
        Tổng cộng: <?= $totalPrice ?> VND
    </div>

    <a href="sanpham.php">Quay lại trang sản phẩm</a>
    <button onclick="location.href='checkout.php'">Thanh toán</button>
</body>
</html>
