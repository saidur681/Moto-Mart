<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MotoMart</title>

    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
      /* General Styles */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        line-height: 1.6;
        background-color: #f4f4f4;
        color: #333;
      }

      a {
        text-decoration: none;
        color: #333;
        transition: color 0.3s ease;
      }

      a:hover {
        color: #007bff;
      }

      /* Navbar */
      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: aqua;
        padding: 10px 20px;
        color: #fff;
      }

      .navbar .logo img {
        max-width: 150px;
      }

      .nav-links {
        list-style: none;
        display: flex;
        gap: 15px;
      }

      .nav-links li {
        display: inline-block;
      }

      .nav-links li a {
        color: #fff;
        padding: 8px 15px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
      }

      .nav-links li a:hover {
        background-color: #495057;
      }

      .nav-icons {
        display: flex;
        gap: 15px;
        align-items: center;
      }

      .nav-icons .search input[type="search"] {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      .nav-icons button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .nav-icons button:hover {
        background-color: #0056b3;
      }

      /* Dropdown Menu */
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

      /* Brand Section */
      .brand-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
        background: url('images/background.png') no-repeat center center/cover;
        background-size: cover;
      }

      .brand {
        margin: 15px;
        padding: 15px 30px;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        background: rgba(0, 0, 0, 0.6);
        border-radius: 10px;
        text-transform: uppercase;
        cursor: pointer;
        animation: fadeIn 2s ease-in-out;
        transition: transform 0.3s, background 0.3s;
      }

      .brand:hover {
        transform: scale(1.1);
        background: rgba(0, 0, 0, 0.8);
      }

      @keyframes fadeIn {
        0% {
          opacity: 0;
          transform: translateY(50px);
        }
        100% {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Footer */
      footer {
        background-color: #343a40;
        color: #fff;
        text-align: center;
        padding: 20px;
        margin-top: 20px;
        position: relative;
        bottom: 0;
        width: 100%;
      }

      footer .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 20px;
      }

      footer .footer-section {
        flex: 1;
        min-width: 200px;
      }

      footer .footer-section h3 {
        border-bottom: 2px solid #007bff;
        display: inline-block;
        margin-bottom: 10px;
      }

      footer ul {
        list-style: none;
        padding: 0;
      }

      footer ul li a {
        color: #fff;
      }

      footer .social-media ul {
        display: flex;
        justify-content: center;
        gap: 10px;
      }

      footer .footer-bottom {
        margin-top: 20px;
      }
    </style> 
  </head>
  <body>
    <!-- First Nav -->
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
    <form action="search_product.php" method="GET">
        <input type="search" placeholder="Search Bike" aria-label="search" name="search_data" required>
        <input type="submit" value="Search" name="search_data_product">
    </form>
</div>
        <button><a href="user_login.php"  class="login-register">Login</a></button>
      </div>
    </nav>

    <div class="product-section">
      <div class="product-grid">
        <?php
          include "./connect.php";
          include "./function.php";
        ?>

         <!-- Product Section -->
    <div class="product-section">
        <h2 class="text-center">
            <?php
            // Check if a brand is selected
            if (isset($_GET['brand']) && $_GET['brand'] != "") {
                $selected_brand = $_GET['brand'];
                echo "Products for Brand: $selected_brand";
            } else {
                echo "All Products";
            }
            ?>
        </h2>

        <div class="product-grid">
            <?php
            // Fetch and display products based on the selected brand
            if (isset($_GET['brand']) && $_GET['brand'] != "") {
                $selected_brand = mysqli_real_escape_string($con, $_GET['brand']);
                $query = "SELECT * FROM `products` WHERE `product_brand` = '$selected_brand'";
            } else {
                $query = "SELECT * FROM `products`";
            }

            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <div class='product-card'>
                             
                            <img src='./admin_Area/product_images/{$row['image1']}' alt='Product Image'>
                            <h3>{$row['product_title']}</h3>
                            <p>Color: {$row['product_color']}</p>
                            <p>Price: {$row['price']}</p>
                            <p>Model Year: {$row['model_year']}</p>
                            <p>{$row['product_description']}</p>
                            <a href='#' class='btn'>Add to cart</a>
                    <a href='product_details.php?product_id={$row['product_id']}' class='btn'>View More</a>
                        </div>
                    ";
                }
            } else {
                echo "<script>alert('No products found for the selected brand');
                 window.location.href = 'index.php';
                </script>";
                
                //echo "<p>No products found for the selected brand.</p>";
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
