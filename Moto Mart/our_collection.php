<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MotoMart</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
      // JavaScript function to show alert when the user clicks "Service"
      function showServiceMessage() {
        alert("If you need service, please contact us.");
      }
    </script>
    <style>
      /* Dropdown Menu Styling */
      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 150px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: black;
        padding: 10px 16px;
        text-decoration: none;
        display: block;
      }

      .dropdown-content a:hover {
        background-color: #f1f1f1;
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .dropdown:hover .dropbtn {
        background-color: #ddd;
      }
    </style>

</head>
  <body>
    <!--First Nav -->
    <nav class="navbar">
      <div class="logo">
        <img src="images/motomartlogo.jpg" alt="Logo">
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="our_collection.php">Our Collection</a></li>
        <li class="dropdown">
          <a href="javascript:void(0);" class="dropbtn">Brand</a>
          <div class="dropdown-content">
  <a href="products.php?brand=Yamaha">Yamaha</a>
  <a href="products.php?brand=Honda">Honda</a>
  <a href="products.php?brand=Suzuki">Suzuki</a>
  <a href="products.php?brand=Kawasaki">Kawasaki</a>
  <a href="products.php?brand=Bajaj">Bajaj</a>
  <a href="products.php?brand=GPX">GPX</a>
  <a href="products.php?brand=BMW">BMW</a>
</div>
        </li>
        <li><a href="#">Accessories</a></li>
        <li><a href="javascript:void(0);" onclick="showServiceMessage();">Service</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#" class="icon">
          <i class="fa-solid fa-cart-shopping"></i>
        </a></li>
      </ul>
      <div class="nav-icons">
        <div class="search">
          <input type="text" placeholder="Search Bike">
          <button type="submit">Search</button>
        </div>
        <button><a href="user_login.php" class="login-register">Login</a></button>
      </div>
      <div id="welcome-message" class="welcome-message"></div>
    </nav>
   

        <!-- Third Child: Header Section -->
        <div class="header-section">
          <h2 class="text-center">Bike Sell and Exchange</h2>
          <p class="text-center">Before you start, welcome to Moto Mart! In this page, you will get all bike and accessory prices in BD. Thanks for visiting.</p>
        </div>

        <!-- Fourth Child: Product Section -->
        <div class="product-section">
          <div class="product-grid">

            <?php
              include "./connect.php";
              $select_query = "SELECT * FROM `products`";
              $result_query = $con->query($select_query);

              while($row = $result_query->fetch_assoc()){
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $price = $row['price'];
                $product_brand = $row['product_brand'];
                $model_year = $row['model_year'];
                $image1 = $row['image1'];
                echo "
                <div class='product-card'>
                  <img src='./admin_Area/product_images/$image1' alt='$product_title'>
                  <div class='product-info'>
                    <h3>$product_title</h3>
                    <h4>Price: $price</h4>
                    <p>Brand: <b>$product_brand</b></p>
                    <p>Model Year: $model_year</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn'>View More</a>
                  </div>
                </div>";
              }

              
            ?>

          </div>
        </div>
        

        <div class="bg-info">
     <footer>
  <div class="footer-container">
    <div class="footer-section">
      <h3>MOTO MART BD MIRPUR 2</h3>
      <p>Mirpur</p>
      <p>Sawar, BOX 11-25. R 5, Block A Mirpur 2, Dhaka.</p>
      <p>Dhaka Metro, Dhaka 1218</p>
      <p>01766614293</p>
    </div>
    <div class="footer-section">
      <h3>MOTO MART Exchange Point</h3>
      <p>Uttara</p>
      <p>Plot No: 15 Rood No: 6/C, DHAKA 1230. Dhoka Metro</p>
      <p>Dhaka 1238</p>
      <p>01896108915</p>
    </div>
    <div class="footer-section">
      <h3>MOTO MART BD GAZIPUR</h3>
      <p>Gazipur Sadar-Joydebpur</p>
      <p>5094-58V, Bhagherbazar, Bhawalgor, Gazipur.</p>
      <p>Gazipur, Dhaka 1703</p>
      <p>01764000305</p>
    </div>
    <div class="footer-section">
      <h3>MERAMOTKHANA MOTO MART BD</h3>
      <p>Gazipur Sadar-Joydebpur</p>
      <p>Bagher Bazar, Bhabanlour, Gazipur, Bangladesh.</p>
      <p>Gazipur, Dhaka 1703</p>
      <p>01896-108915</p>
    </div>
  </div>
  <div class="social-media">
    <h3>FOLLOW US</h3>
    <ul>
      <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>   
      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </div>
  <div class="footer-bottom">   

    <p>Servicing | Privacy Policy | Terms and Conditions</p>
  </div>
</footer>

     </div>

  </body>
</html>
