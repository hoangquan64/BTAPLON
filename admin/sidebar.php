 <!-- Sidebar -->
 <aside class="sidebar">
    <?php 
        $isUser = str_contains($_SERVER['REQUEST_URI'], 'user');
        $isProduct = str_contains($_SERVER['REQUEST_URI'], 'product');
        $isOrder = str_contains($_SERVER['REQUEST_URI'], 'order');
    ?>
      <h2>🛠️ Admin</h2>
      <ul>
        <li><a href="http://baitaplon.test/btaplon/admin">🏠 Trang chính</a></li>
        <li <?= $isProduct? 'style="background-color: black;"' : '' ?> ><a href="http://baitaplon.test/btaplon/admin/product">📦 Quản lý sản phẩm</a></li>
        <li><a href="#">📂 Quản lý danh mục</a></li>
        <li <?= $isOrder? 'style="background-color: black;"' : '' ?>><a href="http://baitaplon.test/btaplon/admin/order">🧾 Quản lý đơn hàng</a></li>
        <li <?= $isUser? 'style="background-color: black;"' : '' ?>><a href="http://baitaplon.test/btaplon/admin/user">👥 Quản lý người dùng</a></li>
        <li><a href="#">🚪 Đăng xuất</a></li>
      </ul>
    </aside>    