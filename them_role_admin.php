<?php
$conn = new mysqli("localhost", "root", "", "milk-sale");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi thay đổi quyền
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_role'])) {
    $user_id = $_POST['user_id'];
    $new_role = $_POST['role'];
    $conn->query("UPDATE user SET role='$new_role' WHERE id=$user_id");
}

// Lấy danh sách người dùng
$result = $conn->query("SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý phân quyền</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        h2 { text-align: center; }
        form { margin: 0; }
    </style>
</head>
<body>
    <h2>Trang Quản Lý Phân Quyền</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Quyền hiện tại</th>
            <th>Thay đổi quyền</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['role'] ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                    <select name="role">
                        <option value="user" <?= $row['role'] == 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                    <button type="submit" name="update_role">Cập nhật</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>