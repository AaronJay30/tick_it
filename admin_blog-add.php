<?php
        include('include/config.php');
        session_start();
    
        if(!isset($_SESSION['admin_name'])){
            header('location:index.php');
        }

        $today = date("Y-m-d");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    
    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>  
    <div class="container">
        <form action="upload-blog.php" method="POST" enctype="multipart/form-data" >
            <h4 class="display-4 text-center">Add Blog</h4><hr><br>
            
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="blogTitle" class="form-control" placeholder="Blog title" required>
            </div>
            
            <div class="mb-3">
                <label>Author</label>
                <input type="text" name="blogAuthor" class="form-control" placeholder="Author of blog" required>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <input type="text" name="blogCategory" class="form-control" placeholder="Category of blog" required>
            </div>
            <div class="mb-3">
                <label>Publish Date</label>
                <input readOnly="true" type="date" name="publish_date" value="<?php echo htmlspecialchars($today); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Content</label><br>
                <textarea rows ="5"cols="89" name="content" style="border:solid 1px black;"> REMINDER: If your description have apostrophe mark (') please remove it</textarea><br>
            </div>
            <div class="mb-3">
                <label>Feature Image</label><br>
                <input type="file" name="file" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary ">Add </button>
        </form>
    </div>
</body>
    

</html>