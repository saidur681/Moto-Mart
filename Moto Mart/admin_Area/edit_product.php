<?php
include "../connect.php";

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_data);

    if ($row = mysqli_fetch_assoc($result)) {
        $product_title = $row['product_title'];
        $product_color = $row['product_color'];
        $product_price = $row['price'];
        $product_brand = $row['product_brand'];
        $model_year = $row['model_year'];
        $product_description = $row['product_description'];
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $status = $row['status'];
        $product_keyword = $row['product_keyword'];
    } else {
        die("No product found for ID: $edit_id.");
    }
} else {
    die("No product ID provided.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Body Background */
        body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #fff; /* Plain white background */
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

        /* Form Card Styling */
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            padding: 20px;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Input Styles */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #2575fc;
        }

        /* Buttons */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #2575fc;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background: #6a11cb;
        }

        /* Image and Input Container */
        .image-input-container {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .image-preview img {
            max-width: 100px;
            max-height: 100px;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-card {
                padding: 15px;
            }

            .image-input-container {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

</head>
<body>
    <div class="form-card">
        <h2>Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="product_title">Product Title</label>
                <input type="text" id="product_title" value="<?php echo ($product_title); ?>" name="product_title" required>
            </div>
            <div>
                <label for="product_color">Product Color</label>
                <input type="text" id="product_color" value="<?php echo ($product_color); ?>" name="product_color" required>
            </div>
            <div>
                <label for="product_price">Product Price</label>
                <input type="text" id="product_price" value="<?php echo ($product_price); ?>" name="product_price" required>
            </div>
            <div>
                <label for="product_brand">Product Brand</label>
                <select name="product_brand" id="product_brand" required>
                    <option value="">Select Bike Brand</option>
                    <?php
                    $brands = ['YAMAHA', 'Suzuki', 'Honda', 'GPX', 'Royal Enfield', 'KTM', 'BMW'];
                    foreach ($brands as $brand) {
                        $selected = ($product_brand === $brand) ? 'selected' : '';
                        echo "<option value='$brand' $selected>$brand</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="model_year">Model Year</label>
                <select name="model_year" id="model_year" required>
                    <option value="">Select Year</option>
                    <?php
                    $currentyear = date("Y");
                    for ($i = 2000; $i <= $currentyear; $i++) {
                        $selected = ($model_year == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="product_description">Product Description</label>
                <textarea id="product_description" name="product_description" required><?php echo ($product_description); ?></textarea>
            </div>
            <div class="image-input-container">
                <label for="image1">Product Image 1</label>
                <div>
                    <input type="file" name="image1" id="image1" onchange="previewImage(event, 'preview1')">
                    <div id="preview1" class="image-preview">
                        <?php if (!empty($image1)) { ?>
                            <img src="./product_images/<?php echo ($image1); ?>" alt="Product Image 1">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="image-input-container">
                <label for="image2">Product Image 2</label>
                <div>
                    <input type="file" name="image2" id="image2" onchange="previewImage(event, 'preview2')">
                    <div id="preview2" class="image-preview">
                        <?php if (!empty($image2)) { ?>
                            <img src="./product_images/<?php echo ($image2); ?>" alt="Product Image 2">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="image-input-container">
                <label for="image3">Product Image 3</label>
                <div>
                    <input type="file" name="image3" id="image3" onchange="previewImage(event, 'preview3')">
                    <div id="preview3" class="image-preview">
                        <?php if (!empty($image3)) { ?>
                            <img src="./product_images/<?php echo ($image3); ?>" alt="Product Image 3">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div>
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="Available" <?php echo ($status === 'Available') ? 'selected' : ''; ?>>Available</option>
                    <option value="Unavailable" <?php echo ($status === 'Unavailable') ? 'selected' : ''; ?>>Unavailable</option>
                </select>
            </div>
            <div>
                <label for="product_keyword">Product Keywords</label>
                <input type="text" id="product_keyword" value="<?php echo ($product_keyword); ?>" name="product_keyword" required>
            </div>
            <!-- Submit Button -->
            <div>
                <input type="submit" name="edit_product" value="Update Product">
            </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_color=$_POST['product_color'];
    $price=$_POST['product_price'];
    $product_brand=$_POST['product_brand'];
    $model_year=$_POST['model_year'];
    $product_description=$_POST['product_description'];
    $status=$_POST['status'];
    $product_keyword=$_POST['product_keyword'];

    //access images
    $image1=$_FILES['image1']['name'];
    $image2=$_FILES['image2']['name'];
    $image3=$_FILES['image3']['name'];

    //access images temp name
    $temp_image1=$_FILES['image1']['tmp_name'];
    $temp_image2=$_FILES['image2']['tmp_name'];
    $temp_image3=$_FILES['image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' || $product_color=='' || $price=='' || $product_brand=='' || $model_year=='' || $product_description=='' || $product_keyword=='') {
        echo "<script>alert('Please fill all the available fields.')</script>";
        exit();
    } else {
        // Move uploaded files to the directory
        if ($image1) move_uploaded_file($temp_image1, "./product_images/".$image1);
        if ($image2) move_uploaded_file($temp_image2, "./product_images/".$image2);
        if ($image3) move_uploaded_file($temp_image3, "./product_images/".$image3);

        // Query to update the product
        $update_products = "UPDATE `products` SET 
            product_title = '$product_title', 
            product_color = '$product_color', 
            price = '$price', 
            product_brand = '$product_brand', 
            model_year = '$model_year', 
            product_description = '$product_description', 
            status = '$status', 
            product_keyword = '$product_keyword'";

     
        if ($image1) $update_products .= ", image1 = '$image1'";
        if ($image2) $update_products .= ", image2 = '$image2'";
        if ($image3) $update_products .= ", image3 = '$image3'";

        $update_products .= " WHERE product_id = $edit_id";

       
        $result = mysqli_query($con, $update_products);

        if ($result) {
            echo "<script>alert('Product updated successfully.');
            window.location.href = 'view_products.php';
            </script>";
    
        } else {
            echo "<script>alert('Failed to update the product. Please try again.')</script>";
        }
    }
}

?>
