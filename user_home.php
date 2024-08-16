<?php

    include('include/config.php');
    session_start();

    if(!isset($_SESSION['user_name'])){
        header('location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Home</title>
    

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="home-body">
    <?php include('include/header.php'); ?>
    
    <div class="main" >
        <div class="main-content" style="margin-left: 50px; font-size: 13rem">
            <span class="webdev">WELCOME</span>
            <span class="socod" style="margin-left: 180px">Click it or Tick It</span>
        </div>
    </div>
    <div class="neon-container">
        <a href="user_booking.php"><div class="neon-button">
            Buy Ticket
        </div></a>
    </div>

    
</body>
</html>