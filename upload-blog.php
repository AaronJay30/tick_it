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
                    
                    $fileNameNew = uniqid('BI', true). "." .$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    
                    $title = $_POST['blogTitle'];
                    $author = $_POST['blogAuthor'];
                    $category = $_POST["Category"];
                    $date = $_POST['publish_date'];
                    $content = $_POST['content'];
                    $category = strtolower($category);
                    $category = ucfirst($category);

                    


                    $sql = "INSERT INTO blog (title, author, image, content, Category, published_date) VALUES ('$title','$author', '$fileNameNew', '$content', '$category',  '$date')";
                    
                    mysqli_query($conn, $sql);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    
                    header('location:admin_blog.php?success=Added');
                    

                } 
                else {
                    header('location:admin_blog-add.php?error=Your file is too big!');
                }
            } 
            else {
                header('location:admin_blog-add.php?error=There was an error while uploading your file!');
            }
        } 
        else {
            header('location:admin_blog-add.php?error=You cannot upload files of this type!');
        }
    }

?>