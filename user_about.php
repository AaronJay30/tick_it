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
    <title>User | About</title>
    

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="background-img">
    <?php include('include/header.php'); ?>
    
    <section class="about">
        <div class="about-main">
            <img src="images/Logo-tickit.png" style="transform:scale(1.2); margin-top:70px;">
            <div class="about-text">
                <h1>About <span>Us</span></h1>
                <h5>Our<span> Secrets</span></h5>
                <p>&nbsp&nbsp&nbsp Tick it is a movie ticket booking website. It is a free-to-use booking ticket site where you can book or purchase a ticket without any hassle. All the information is strictly secured and if there is any error, you can directly contact the website. Just one important thing: it must be internet-connected.
                    <br><br> How to Use?

                    <br> 1. Visit the tickit.tk
                    <br> 2. Sign Up
                    <br> 3. Purchase ticket in booking page
                    <br> 4. Choose a movie, Fill up the form & Click "Order Ticket"
                    <br> 5. Check email for ticket information.

                    That's it. Enjoy Tick It.</p>
                    <a href="https://mail.google.com/mail/u/0/?fs=1&to=movietick.it@gmail.com&tf=cm"  target="_blank"><button type="button"> Let's Talk </button></a>
            </div>
        </div>
    </section>

</body>
</html>
