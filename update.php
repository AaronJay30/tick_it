<?php

    include('include/config.php');
    session_start();

    if(isset($_POST['submit'])){
                    
        $id = $_GET['updateid'];
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $date_showing = $_POST['showing'];
        $end_date = $_POST['end'];
        $description = $_POST['description'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];
        $price = $_POST['price'];
                    
        $sql = "UPDATE movies SET price = '$price', title = '$title', director = '$director', genre = '$genre', description = '$description', duration = '$duration' , date_showing = '$date_showing', end_date = '$end_date' WHERE id = '$id' ";
                    
        $result = mysqli_query($conn, $sql);
                    
        if ($result) {
            header("Location: admin_booking.php?success=Successfully Updated");
        }
        else {
            header("Location: admin_booking-update.php?id=$id&error=Unknown error occurred");
        }
    }
?>