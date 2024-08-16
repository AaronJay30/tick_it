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
    <title>User | Blog</title>


    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
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
    
    <section id="blog"> 
        <div class="blog-heading" style="margin-top: 8%;">
            <span>BLOG</span><h3>RECENT POSTS</h3>
        </div>
        <div class="blog-container">
        <?php
            $sql = "SELECT * FROM blog ORDER BY Category";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $title = $row["title"];
                    $author = $row["author"];
                    $image = $row["image"];
                    $content = $row["content"];
                    $category = $row['Category'];
                    $date = $row['published_date'];

                    echo '<div class="blog-box">
                        <div class="blog-img">
                            <img src="images/'.$image.'" alt="Blog">
                        </div>
        
                        <div class="blog-text">
                            <span>'.$date.' | '.$category.'</span>
                            <a href="#" class="blog-title">'.$title.'</a>
                            <p>'.$content.'</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>';
                }
            }
        ?>
        </div>
        
        

            
        </div>

    </section>
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
