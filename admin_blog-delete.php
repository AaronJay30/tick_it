<?php
    
    include('include/config.php');;
    session_start();

    if(!isset($_SESSION['admin_name'])){
        header('location:index.php');
    }

    if(isset($_GET['deleteid'])){

        $id = $_GET['deleteid'];

        $sql = "DELETE FROM blog WHERE id=$id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: admin_blog.php?success=Successfully deleted");
        }else {
            header("Location: admin_blog.php?error=Unknown error occurred");
        }

    }else {
            header("Location: admin_blog.php?");
    }