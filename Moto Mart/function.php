<?php
include "./connect.php";

function getproducts(){
    global $con;

    $select_query = "SELECT * FROM `products` LIMIT 0,3";
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
   
}

//searching product function

function search_products() {
  global $con;

  if (isset($_GET['search_data_product'])) {
      
      $search_data_value = $_GET['search_data'];

      
      $search_query = "SELECT * FROM `products` WHERE `product_keyword` LIKE '%$search_data_value%'";

      $result_query = $con->query($search_query);

      if ($result_query && $result_query->num_rows > 0) {
          while ($row = $result_query->fetch_assoc()) {
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
      } else {
          echo "<p>No products match your search.</p>";
      }
  }
}

function view_details() {
  global $con;

  // Check if `product_id` is passed via GET request
  if (isset($_GET['product_id'])) {
      $product_id = $_GET['product_id'];
      
      // Query to get the specific product details by ID
      $select_query = "SELECT * FROM `products` WHERE product_id = '$product_id' LIMIT 1";
      $result_query = $con->query($select_query);

      // Fetch and display the product details
      if ($result_query->num_rows > 0) {
          while ($row = $result_query->fetch_assoc()) {
              $product_id = $row['product_id'];
              $product_title = $row['product_title'];
              $price = $row['price'];
              $product_color = $row['product_color'];
              $product_brand = $row['product_brand'];
              $model_year = $row['model_year'];
              $image1 = $row['image1'];
              $image2 = $row['image2'];
              $image3 = $row['image3'];
              $description = $row['product_description'];
              $product_status = $row['status'];

              // Display product details and images
              echo "
              <div class='product-details'>
                  <h2>$product_title</h2>
                  <div class='images'>
                      <img src='./admin_Area/product_images/$image1' alt='$product_title'>
                      <img src='./admin_Area/product_images/$image2' alt='$product_title'>
                      <img src='./admin_Area/product_images/$image3' alt='$product_title'>
                  </div>
                  <div class='info'>
                      <h3>Price: $price</h3>
                      <p><strong>Brand:</strong> $product_brand</p>
                      <p><strong>Model Year:</strong> $model_year</p>
                      <p><strong>Color:</strong> $product_color</p>
                      <p><strong>Status:</strong> $product_status</p>
                      <p><strong>Description:</strong> $description</p>
                  </div>
                  <div class='actions'>
                      <a href='index.php?add_to_cart=$product_id' class='btn'>Add to Cart</a>
                      
                  </div>
              </div>";
          }
      } else {
          echo "<p>Product not found!</p>";
      }
  } else {
      echo "<p>No product ID provided!</p>";
  }
}


//Add to cart Function

function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * ";
    }
}




?>