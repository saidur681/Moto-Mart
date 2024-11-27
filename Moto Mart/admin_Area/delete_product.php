<?php
include "../connect.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Delete the product
    $delete_query = "DELETE FROM `products` WHERE `product_id` = $product_id";
    if (mysqli_query($con, $delete_query)) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . mysqli_error($con);
    }
} else {
    die("Invalid request.");
}
?>
