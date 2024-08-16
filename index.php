<?php

    include('include/config.php');

    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['password']);

        $select = "SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'admin'){

                $_SESSION['admin_name'] = $row['name'];
                header('location:admin_booking.php');
            }
            elseif($row['user_type'] == 'user') {

                $_SESSION['user_name'] = $row['name'];
                header('location:user_home.php');
            }
        }else{
            $error[] = "Incorrect email or password!";
        }
          
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Sign In</h3>
            <?php 
                if(isset($error)){
                    foreach($error as $error) {
                        echo '<span class="error-msg">'. $error .'</span>';
                    }
                };
            ?> 
            <input type="email" name="email" required placeholder="Enter your email" autocomplete="off">
            <input type="password" name="password" required placeholder="Enter your password" autocomplete="off">
            <input type="submit" name="submit" value="Sign in" class="form-btn">
            <p>Don't have an account? <a href="register_form.php">Sign up</a></p>
        </form>
    </div>
    
</body>
</html>