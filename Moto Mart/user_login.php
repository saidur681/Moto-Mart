<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url('images/motomart-logo.webp') no-repeat center center fixed;
    background-size: cover;
    color: #333;
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}


.container {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    width: 360px;
    padding: 25px 30px;
    text-align: center;
}

h2 {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #2c3e50;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

input[type="text"], 
input[type="password"] {
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 8px;
    transition: 0.3s ease;
}

input[type="text"]:focus, 
input[type="password"]:focus {
    border-color: #1e90ff;
    box-shadow: 0 0 8px rgba(30, 144, 255, 0.4);
    outline: none;
}

input[type="submit"] {
    background: linear-gradient(135deg, #1e90ff, #007bff);
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    padding: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(135deg, #007bff, #0056b3);
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
    transform: translateY(-2px);
}

p {
    font-size: 15px;
    margin-top: 20px;
    color: #7f8c8d;
}

a {
    text-decoration: none;
    color: #007bff;
    font-weight: 600;
    transition: color 0.3s ease;
}

a:hover {
    color: #0056b3;
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>User Login</h2>

        <form method="POST">
            <input type="text" name="user_name" id="user_name" placeholder="Enter your user name" autocomplete="off" required>
            <input type="password" name="user_password" id="user_password" placeholder="Enter your password" autocomplete="off" required>
            <input type="submit" name="submit" value="Login">
        </form>

        <p>If you have no account, <a href="user_registration.php">register</a></p>
    </div>
</body>
</html>

<?php
session_start();
include "./connect.php";

if (isset($_POST['submit'])) {
    $user_username = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM user_table WHERE user_name='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        $row_data = mysqli_fetch_assoc($result);
        $stored_password = $row_data['user_password'];

        if ($user_password === $stored_password) {
            $_SESSION['username'] = $user_username; // Save username in session
            echo "<script>alert('Login successful');</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('Invalid Username');</script>";
    }
}
?>
