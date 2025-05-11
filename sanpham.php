<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "milk-sale";

  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT id, name, price, image FROM products";
  $result = mysqli_query($conn, $sql);

  $products = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($products, $row);
   // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " ?: " . $row["price"].  "img :". $row["image"]. "<br>";
  }
} else {
  echo "0 results";
}

// var_dump($products);  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sanpham.css">
    <title>Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

  <section class="products">
      <h2>Sản Phẩm Cửa Hàng</h2>
      <div class="product-grid">
        <!-- Sản phẩm 1 -->
         <?php 
            foreach($products as $product) {

          ?>

        <div class="product-item">
          <a href="detail.html"><img src="<?=$product['image']?>" alt=""></a>
  
          <h3><?= $product['name']; ?></h3>
          <p>Giá:<?=$product['price']?>VND</p>
          <a href="addCart.php?id=<?=$product['id']?>"><button>Thêm vào giỏ hàng</button></a>
         
          
        </div> 
        <?php
            }
         ?>
      </div>

      <a href="giohang.php">
  <span style="color:white;">
    <div style="
      position: fixed; 
      top: 0; 
      right: 20px; 
      width: 50px; 
      height: 50px; 
      border-radius: 50%; 
      display: flex; 
      align-items: center; 
      justify-content: center;
      ">
      <ion-icon name="cart" style="font-size: 30px; color: black;"></ion-icon>
      <?php 
      if (isset($_COOKIE['cart'])) {
        $cart_count = $_COOKIE['cart'];  // Get the number of items in the cart
        echo "<div style='position: absolute; top: 5px; right: 5px; background-color: white ; color: red; font-size: 12px; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center;'>$cart_count</div>";
      } else {
        echo "<div style='position: absolute; top: 5px; right: 5px; background-color: white; color: red; font-size: 12px; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center;'>0</div>";
      }
      ?>

    </div>
  </span>
</a>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      
  </section>
</body>
</body>
</html>
