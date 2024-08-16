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
    <title>Admin | Booking</title>

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>  

    <?php
        $id = $_GET['updateid'];
        $getsql = "SELECT * FROM movies WHERE id = '$id'";
        $selectResult = mysqli_query($conn, $getsql);

        $row = mysqli_fetch_assoc($selectResult);

        $title = $row["title"];
        $cover = $row["cover_img"];
        $desc = $row["description"];
        $duration = $row["duration"];
        $showing = $row["date_showing"];
        $end = $row["end_date"];
        $genre = $row['genre'];
        $director = $row['director'];
        $price = $row['price'];
    ?>

    <div class="container">
        <form method="POST">
            <h4 class="display-4 text-center">Update Movie</h4><hr><br>
            
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Movie title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>
            <div class="mb-3">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" placeholder="Genre of movie" value="<?php echo htmlspecialchars($genre); ?>" required>
            </div>
            <div class="mb-3">
                <label>Director</label>
                <input type="text" name="director" class="form-control" placeholder="Director of movie" value="<?php echo htmlspecialchars($director); ?>" required>
            </div>
            
            <div class="mb-3">
                <label>Duration</label>
                <input type="number" value="<?php echo htmlspecialchars($duration); ?>" step="any" name="duration" class="form-control" placeholder="Duration of movie" required>
            </div>
            <div class="mb-3">
                <label>Showing Date</label>
                <input type="date" name="showing" value="<?php echo htmlspecialchars($showing); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>End Date</label>
                <input type="date" name="end" value="<?php echo htmlspecialchars($end); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Ticket Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($price); ?>" required>
            </div>
            <div class="mb-3">
                <label>Description</label><br>
                <textarea rows ="5"cols="89" name="description"  style="border:solid 1px black;"><?php echo htmlspecialchars($desc); ?> </textarea><br>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="admin_booking.php" class="link-primary">View</a>
        </form>
    </div>

    <?php    
        if(isset($_POST['submit'])){
                
            $title = $_POST['title'];
            $duration = $_POST['duration'];
            $date_showing = $_POST['showing'];
            $end_date = $_POST['end'];
            $description = $_POST['description'];
                            
            $sql = "UPDATE movies SET title = '$title', description = '$description', duration = '$duration' , date_showing = '$date_showing', end_date = '$end_date' WHERE id = '$id'";
                            
            $result = mysqli_query($conn, $sql);
                            
            if ($result) {
                header("Location: admin_booking.php?success=Successfully Updated");
            }
            else {
                    header("Location: admin_booking-update.php?id=$id&error=Unknown error occurred");
            }
        }
        ?>
</body>
    

</html>