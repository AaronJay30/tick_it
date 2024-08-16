<?php

    include('include/config.php');

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $select = "SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $error[] = 'User already exist!';
        }
        else{

            if($pass != $cpass) {
                $error[] = 'Password not match';
            }else{
                $insert = "INSERT INTO user (name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";
               mysqli_query($conn, $insert);
               header('location:index.php');
            }
    
    
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Sign up</h3>
            <?php 
                if(isset($error)){
                    foreach($error as $error) {
                        echo '<span class="error-msg">'. $error .'</span>';
                    }
                };
            ?>
            <input type="text" name="name" required placeholder="Enter your name" autocomplete="off">
            <input type="email" name="email" required placeholder="Enter your email" autocomplete="off">
            <input type="password" name="password" required placeholder="Enter your password" autocomplete="off">
            <input type="password" name="cpassword" required placeholder="Confirm your password" autocomplete="off">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Sign Up" class="form-btn">
            <p>Already have an account? <a href="index.php">Sign in</a></p>
        </form>
    </div>
    
</body>
</html>