<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background: url('images/motomart-logo.webp') no-repeat center center fixed;
    background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            max-width: 500px;
            margin: 20px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], 
        input[type="password"], 
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New User Registration</h2>
    </div>

    <div>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label for="user_username"><b>User Name</b></label>
                <input type="text" name="user_name" id="user_username" placeholder="Enter your user name" autocomplete="off" required>
            </div>

            <div>
                <label for="user_email"><b>Email</b></label>
                <input type="text" name="user_email" id="user_email" placeholder="Enter Your Email" autocomplete="off" required>
            </div>

            <div>
                <label for="user_password"><b>Password</b></label>
                <input type="password" name="user_password" id="user_password" placeholder="Enter new Password" autocomplete="off" required>
            </div>
            <div>
                <label for="conf_user_password"><b>Confirm Password</b></label>
                <input type="password" name="conf_user_password" id="conf_user_password" placeholder="Enter Confirm Password" autocomplete="off" required>
            </div>

            <div>
                <label for="user_image"><b>Image</b></label>
                <input type="file" name="user_image" id="user_image" autocomplete="off" required>
            </div>
            
            <div>
                <label for="user_mobile"><b>Phone Number</b></label>
                <input type="text" name="user_mobile" id="user_mobile" placeholder="Enter your Phone Number"  autocomplete="off" required>
            </div>

            <div>
                <label for="user_address"><b>Address</b></label>
                <input type="text" name="user_address" id="user_address" placeholder="Enter your Address" autocomplete="off" required>
            </div>

            <div>
                <input type="submit" name="submit" value="Submit">
            </div>

            <p>Already have an account? <a href="user_login.php">Login</a></p>
        </form>
    </div>
</body>
</html>

<?php
include "./connect.php";

//insert into Data Base 
if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_image = $_FILES['user_image']['name']; 
    $temp_user_image = $_FILES['user_image']['tmp_name']; 
    $user_mobile = $_POST['user_mobile'];
    $user_address = $_POST['user_address'];

    //select query 
    $select_query="Select * from user_table where user_name='$user_name'";
    $result = $con->query($select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('This user name already exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Confirm Password Not match')</script>"; 
    }
    
    else{
        //checking empty condition
    if($user_name == '' or $user_email == '' or $user_password == '' or $user_image == '' or  $user_mobile == '' or $user_address == '' ){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        
        move_uploaded_file($temp_user_image, "./User_image/".$user_image);

        $insert_form = "INSERT INTO user_table (user_name, user_email, user_password, user_image, user_mobile, user_address) 
                        VALUES ('$user_name','$user_email','$user_password','$user_image','$user_mobile','$user_address')";

        $result = $con->query($insert_form);

        // Check if the query executed successfully
        if($result){
            echo "<script>alert('Successfully User Registration')</script>";  
        } else {
            echo "<script>alert('Failed to insert user: " . mysqli_error($con) . "')</script>";
        }
    }
    }

}
?>