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

      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: ##417fbd;
      }

      .product-details {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        max-width: 900px;
        margin: 30px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .product-details h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
      }

      .images {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
      }

      .images img {
        max-width: 200px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }

      .images img:hover {
        transform: scale(1.05);
      }

      .info {
        text-align: left;
        width: 100%;
        margin-bottom: 20px;
      }

      .info h3 {
        font-size: 1.5rem;
        color: #007bff;
        margin-bottom: 10px;
      }

      .info p {
        font-size: 1rem;
        color: #555;
        margin: 5px 0;
      }

      .actions {
        display: flex;
        justify-content: center;
        margin-top: 20px;
      }

      .actions .btn {
        padding: 10px 20px;
        font-size: 1rem;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
      }

      .actions .btn:hover {
        background: #0056b3;
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

    <div class="header-section">
      <h2 class="text-center">Bike Sell and Exchange</h2>
      <p class="text-center">Before you start, welcome to Moto Mart! In this page, you will get all bike and accessory prices in BD. Thanks for visiting.</p>
    </div>

    <?php
    include "./connect.php";
    include "./function.php";

    view_details();
   

    ?>

    
    

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
