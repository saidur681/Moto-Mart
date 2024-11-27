<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="adminStyle.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: auto;
        }
        .action-btn {
            padding: 5px 10px;
            border: none;
            color: #fff;
            background-color: #007bff;
            cursor: pointer;
            border-radius: 3px;
        }
        .action-btn.delete {
            background-color: #dc3545;
        }

        h3{
            text-align: center;
         }

         .div{
  background-color: burlywood;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1em;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

th, td {
    padding: 12px 15px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: white;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

img {
    width: 50px;
    height: auto;
    border-radius: 5px;
}

.action-btn {
    padding: 5px 10px;
    border: none;
    color: white;
    font-size: 0.9em;
    cursor: pointer;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.action-btn.edit {
    background-color: #007bff;
}

.action-btn.edit:hover {
    background-color: #0056b3;
}

.action-btn.delete {
    background-color: #dc3545;
}

.action-btn.delete:hover {
    background-color: #b21f2d;
}

/* Responsive Design */
@media (max-width: 768px) {
    table {
        font-size: 0.9em;
    }

    img {
        width: 40px;
    }
}
    </style>


    
</head>
<body class="dash";>
<div class="container" ><h2>Welcome to the Moto Mart Admin Dashboard</h2></div>



<ul>
    <li><a href="insert_product.php">Insert Product</a></li>
    <li><a href="view_products.php">View Product List</a></li>
    <li><a href="#">Manage Orders</a></li>
    <li><a href="#">Generate Reports</a></li>
    <li><a href="#">Logout</a></li>
</ul>

<div class=div ><h3 >All Products</h3></div>

<table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product import Date</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

        <?php

include "../connect.php";

$get_products = "SELECT * FROM `products`;";
$result = mysqli_query($con, $get_products);

if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}

$number = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_image = $row['image1'];
    $product_price = $row['price'];
    $date = $row['date'];
    $product_status = $row['status'];
    $number++;
    echo "
    <tr>
        <td>{$number}</td>
        <td>{$product_title}</td>
        <td><img src='../admin_Area/product_images/{$product_image}' alt='{$product_title}'></td>
        <td>{$product_price}</td>
        <td>{$date}</td>
        <td>{$product_status}</td>
         <td><a href='edit_product.php?id={$product_id}' class='action-btn edit'>Edit</a></td>
        <td><a href='delete_product.php?id={$product_id}' class='action-btn delete'>Delete</a></td>
    </tr>";
}

?>
        
        </tbody>
    </table>

</body>
</html>
           
