<?php
        include('include/config.php');
        session_start();
    
        if(!isset($_SESSION['admin_name'])){
            header('location:index.php');
        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    
    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>  
    <div class="container" style="margin-top:70px;">
        <form action="upload-booking.php" method="POST" enctype="multipart/form-data" >
            <h4 class="display-4 text-center">Add Movie</h4><hr><br>
            
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Movie title" required>
            </div>
            
            <div class="mb-3">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" placeholder="Genre of movie" required>
            </div>
            <div class="mb-3">
                <label>Director</label>
                <input type="text" name="director" class="form-control" placeholder="Director of movie" required>
            </div>
            <div class="mb-3">
                <label>Duration</label>
                <input type="number" step="any" name="duration" class="form-control" placeholder="Duration of movie" required>
            </div>
            <div class="mb-3">
                <label>Showing Date</label>
                <input type="date" name="showing" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>End Date</label>
                <input type="date" name="end" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Ticket Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label><br>
                <textarea rows ="5"cols="89" name="description" style="border:solid 1px black;">REMINDER: If your description have apostrophe mark (') please remove it</textarea><br>
            </div>
            <div class="mb-3">
                <label>Cover Image</label><br>
                <input type="file" name="file" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</body>
    

</html>