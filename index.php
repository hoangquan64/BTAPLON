<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TH TRUE MILK</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

  <header>
    <div class="header-container">
      <img src="https://thgroupglobal.com/themes/storefront//public/images/logo.png?v=6819828f57891" alt="TH TRUE MILK" class="logo">
      <nav>
        <ul>
          <li><a href="#">Trang Chủ</a></li>
          <li><a href="/DABTAP/sanpham.php">Cửa Hàng</a></li>
          <li><a href="/DABTAP/hotline.php">Liên Hệ</a></li>
          <li><a href="/DABTAP/giohang.php"> Giỏ Hàng</a></li>
        </ul>
      </nav>
      <div class="user-buttons">
        <?php 
          if (isset($_COOKIE['user_name'])) {
            echo '<button>'. $_COOKIE['user_name'] .'</button>
            <a href="logout.php"><button>Đăng xuất</button></a>';
          } else {
            echo '<a href="login.php"> <button>Đăng Nhập</button> </a>
       <a href="register.php"> <button>Đăng kí</button></a>';
          }

        ?>
        

       
      </div>
    </div>
  </header>

  <main>
    <section class="intro">
        <h1>Chào Mừng Đến Với TH TRUE MILK</h1>
        <div class="intro-content">
          <div class="intro-text">
            <p><strong>TH True Milk</strong> là thương hiệu sữa sạch hàng đầu tại Việt Nam, nổi bật với quy trình sản xuất khép kín và hiện đại đạt tiêu chuẩn quốc tế.</p>
            <p>Với triết lý “sạch thật – chất lượng thật – dinh dưỡng thật”, chúng tôi mang đến cho người tiêu dùng sản phẩm sữa tươi nguyên chất từ trang trại bò sữa công nghệ cao đặt tại Nghệ An.</p>
            <p>TH True Milk cam kết không sử dụng chất bảo quản, không hormone tăng trưởng, đảm bảo sức khỏe cho gia đình Việt.</p>
          </div>
          <div class="intro-image">
            <img src="https://concung.com/img/m/2022/12/1063_image_thumbnail.png">
          </div>
        </div>
      </section>
      

   
  </main>

  <footer>
    <p>&copy; 2025 TH TRUE MILK. All rights reserved.</p>
  </footer>

</body>
</html>
