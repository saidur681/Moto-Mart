<?php
include "../connect.php";

if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_color=$_POST['product_color'];
    $price=$_POST['price'];
    $product_brand=$_POST['product_brand'];
    $model_year=$_POST['model_year'];
    $product_description=$_POST['product_description'];
    $product_status='true';
    $product_keyword=$_POST['product_keyword'];

    //access images
    $image1=$_FILES['image1'] ['name'];
    $image2=$_FILES['image2'] ['name'];
    $image3=$_FILES['image3'] ['name'];


    //access images temp name
    $temp_image1=$_FILES['image1'] ['tmp_name'];
    $temp_image2=$_FILES['image2'] ['tmp_name'];
    $temp_image3=$_FILES['image3'] ['tmp_name'];

    //checking empty condition
    if($product_title=='' or $product_color=='' or $price=='' or $product_brand=='' or $model_year=='' or $product_description=='' or $image1=='' or $image2=='' or $image3=='' or $product_keyword=='' ){
        echo "<script>alert('please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1, "./product_images/".$image1);
        move_uploaded_file($temp_image2, "./product_images/".$image2);
        move_uploaded_file($temp_image3, "./product_images/".$image3);

        $insert_products = "INSERT INTO `products` (product_title, product_color, price, product_brand, model_year, product_description, image1, image2, image3, date, status , product_keyword) 
                    VALUES ('$product_title', '$product_color', '$price', '$product_brand', '$model_year', '$product_description', '$image1', '$image2', '$image3', NOW(), '$product_status','$product_keyword')";

            // Execute the query
            $result_query = mysqli_query($con, $insert_products);

            // Check if the query executed successfully
            if($result_query){
                echo "<script>alert('Successfully inserted the products')</script>";
            } else {
                echo "<script>alert('Failed to insert product: " . mysqli_error($con) . "')</script>";
            }
        }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    
    <!-- CSS Styles -->
    <link rel="stylesheet" href="adminStyle.css">
    

</head>
<body>

    <div class="container">
        <h1>Insert Products</h1>
    </div>

    <!-- Form -->
    <form action="" method="POST" enctype="multipart/form-data">
        
        <!-- Product Title -->
        <div class="form-outline">
            <label for="product_title">Product Title</label>
            <input type="text" name="product_title" id="product_title" placeholder="Enter Product Title" autocomplete="off" required>
        </div>

        <!-- Product Color -->
        <div class="form-outline">
            <label for="product_color">Product Color</label>
            <input type="text" name="product_color" id="product_color" placeholder="Enter Product Color" required>
        </div>

        <!-- Product Price -->
        <div class="form-outline">
            <label for="price">Product Price</label>
            <input type="text" name="price" id="price" placeholder="Enter Product Price" required>
        </div>

        <!-- Product Brand -->
        <div class="form-outline">
            <label for="product_brand">Product Brand</label>
            <select name="product_brand" id="product_brand" required>
                <option value="Select">Select Bike Brand</option>
                <option value="YAMAHA">YAMAHA</option>
                <option value="Suzuki">Suzuki</option>
                <option value="Honda">Honda</option>
                <option value="GPX">GPX</option>
                <option value="Royal Enfield">Royal Enfield</option>
                <option value="KTM">KTM</option>
                <option value="BMW">BMW</option>
            </select>
        </div>

        <!-- Model Year -->
        <div class="form-outline">
            <label for="model_year">Model of Year</label>
            <select name="model_year" id="model_year" required>
                <option value="">Select year</option>
                <?php
                $currentyear = date("Y");
                for ($i = 2000; $i <= $currentyear; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>

        <!-- Product Description -->
        <div class="form-outline">
            <label for="product_description">Product Description</label>
            <input type="text" name="product_description" id="product_description" placeholder="Enter Product Short Description" autocomplete="off" required>
        </div>

        <!-- Product Image 1 -->
        <div class="form-outline">
            <label for="image1">Product Image 1</label>
            <input type="file" name="image1" id="image1" required>
        </div>

        <!-- Product Image 2 -->
        <div class="form-outline">
            <label for="image2">Product Image 2</label>
            <input type="file" name="image2" id="image2" required>
        </div>

        <!-- Product Image 3 -->
        <div class="form-outline">
            <label for="image3">Product Image 3</label>
            <input type="file" name="image3" id="image3" required>
        </div>

        <div class="form-outline">
            <label for="product_keyword">Product Keywords</label>
            <input type="text" name="product_keyword" id="product_keyword" placeholder="Enter product Keyword" autocomplete="off" required>
        </div>

        <!-- Submit Button -->
        <div class="form-outline">
            <input type="submit" name="insert_product" class="btn" value="Insert Product">

        </div>
    </form>

</body>
</html>
