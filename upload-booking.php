<?php

    include('include/config.php');
    session_start();

    if(isset($_POST['submit'])){
        $file = $_FILES['file']; 

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array("jpg", "jpeg", "png");

        if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

                if ($fileSize < 50000000) {
                    
                    $fileNameNew = uniqid('MP', true). "." .$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    $title = $_POST['title'];
                    $duration = $_POST['duration'];
                    $date_showing = $_POST['showing'];
                    $end_date = $_POST['end'];
                    $description = $_POST['description'];
                    $genre = $_POST['genre'];
                    $director = $_POST['director'];
                    $price = $_POST['price'];


                    $sql = "INSERT INTO movies (title, description, duration, date_showing, end_date, cover_img, director, genre, price) VALUES ('$title','$description', '$duration', '$date_showing', '$end_date', '$fileNameNew', '$director', '$genre', '$price')";
                    
                    mysqli_query($conn, $sql);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    
                    header('Location:admin_booking.php?success=Added');
                    

                } 
                else {
                    header('Location:admin_booking-add.php?error=Your file is too big!');
                }
            } 
            else {
                header('Location:admin_booking-add.php?error=There was an error while uploading your file!');
            }
        } 
        else {
            header('Location:admin_booking-add.php?error=You cannot upload files of this type!');
        }
    }

?>