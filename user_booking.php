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
    <title>User | Booking</title>
    
    <script src="jquery-3.3.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

</head>
<body class="background-img">
    <?php include('include/header.php'); 
        
        if(isset($_GET['alert'])) {
           if($_GET['alert'] == "success"){
                echo '<script>
                        function alertMessage(){
                            swal({
                                title: "Order Succesfully",
                                text: "Check your email for the information.",
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
    
    <div class="blog-heading" style="margin-top: 10%;">
            <span></span><h3>NOW SHOWING</h3>
    </div>
    
    <div class="movie-container">

        <?php 
            $sql = "SELECT * FROM movies WHERE end_date > CURRENT_DATE() AND date_showing <= CURRENT_DATE()";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $title = $row["title"];
                    $cover = $row["cover_img"];
                    $duration = $row["duration"];
                    $genre = $row['genre'];
                    $genreArray = explode("/", $genre);

                    echo'<a href="user_booking-process.php?id='.$id.'">
                            <div class="bx">
                                <img src="images/'.$cover.'" alt="">
                                <div class="bx-content">
                                    <h3>'.$title.'</h3>
                                    <p>';
                    foreach($genreArray as $genres){
                        echo $genres.' ';
                    }
                    echo '          </p>
                                        <h6>Duration: '.$duration.' hr</h6>
                                    </div>
                                </div>
                            </a>';

                }
            }
        ?>
    </div>

    <script>
        function alertMessage(){
            swal({
                title: "Order Succesfully!",
                text: "Check your email for the ticket information.",
                icon: "success",
                button: "Continue",
                });
        }
    </script>
    
</body>
</html>
