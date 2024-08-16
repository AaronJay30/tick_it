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
    <title>Contact Us</title>
    
    <script src="jquery-3.3.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

</head>
<body class="">
    <?php include('include/header.php');
        
        if(isset($_GET['alert'])) {
            if($_GET['alert'] == "success"){
                 echo '<script>
                         function alertMessage(){
                             swal({
                                 title: "Thank you!",
                                 text: "Check your email for the response.",
                                 icon: "success",
                                 button: "Continue",
                                 });
                         }
                         alertMessage();
                     </script>';
            } else if ($_GET['alert'] == "error"){
                 echo '<script>
                         function alertMessage(){
                             swal({
                                 title: "Error!",
                                 text: "Something bad happened, Please try again!",
                                 icon: "error",
                                 button: "Continue",
                                 });
                         }
                         alertMessage();
                     </script>';
             }
         }
    ?>
   
    <section class="contact">
        <div class="content">
            <h2>CONTACT US</h2>
            <hr class="line">
            <p>For all enquiries, please email us using the form below</p>
        </div>
        <br>
        <div class="contact-container">
            <div class="contact-info">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></i></div>
                    <div class="contact-text">
                        <h3>Address</h3>
                        <p>PWJH+3XC, Central Luzon State University,<br> Science City of Muñoz, Nueva Ecija <br>Philippines</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></i></div>
                    <div class="contact-text">
                        <h3>Phone</h3>
                        <p>+6344 456 0688</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></i></div>
                    <div class="contact-text">
                        <h3>Email</h3>
                        <p>op@clsu.edu.ph</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
            <form action="send-email-concern.php" method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" autocomplete="off" class="inputName" required>
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" autocomplete="off" class="inputEmail" required>
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="content" required class="inputContent" rows="3"></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send">
                    </div>
                </form>
            </div>
        </div>

    </section>
    <script>
        function alertMessage(){
            swal({
                title: "Thank you!",
                text: "Check your email for the response.",
                icon: "success",
                button: "Continue",
                });
        }
    </script>
    
</body>
</html>
