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
<body class="background-img-booking">
    <?php include('include/header_admin.php'); ?>

    <div class="container">
		<div class="box">
        <div class="blog-heading" style="margin-bottom: 2%;">
                <span></span><h3>UPCOMING MOVIES</h3>
            </div>

			<?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
		    <?php } ?>
            
            <div class="link-right">
            <input type="text" id="myInput" onkeyup="tableSearch()" placeholder="Search title in the table" class="form-control" style="height:45px;">
                <button class="btn btn-secondary"><a href="admin_booking-add.php" class="link-primary text-light">Add Movie</a></button> <br>
                <button class="btn btn-secondary"><a href="admin_booking-not-showing.php" class="link-primary text-light">Past Showing</a></button>
                <button class="btn btn-secondary"><a href="admin_booking.php" class="link-primary text-light">All Movies</a></button>
                <button class="btn btn-secondary"><a href="admin_booking-now-showing.php" class="link-primary text-light">Now Showing</a></button>
			</div>

			<table class="table table-striped text-center " id="myTable">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Director</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Date Showing</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Operation</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM movies WHERE date_showing > CURRENT_DATE()";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row["id"];
                                $title = $row["title"];
                                $cover = $row["cover_img"];
                                $desc = $row["description"];
                                $duration = $row["duration"];
                                $showing = $row["date_showing"];
                                $end = $row["end_date"];
                                $genre = $row['genre'];
                                $director = $row['director'];

                                echo '<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td class="title">'.$title.'</td>
                                    <td class="image-poster"><img src=images/'."$cover".' class="poster"></td>
                                    <td>'.$director.'</td>
                                    <td>'.$genre.'</td>
                                    <td class="description">'.$desc.'</td>
                                    <td>'.$duration.' hour'.'</td>
                                    <td class="date">'.$showing.'</td>
                                    <td class="date">'.$end.'</td>
                                    <td class="operation"> 
                                        <button class="btn btn-primary"><a href="admin_booking-update.php?updateid= '.$id.'" class="text-light">Update</a></button>
                                        <button class="btn btn-danger"><a href="admin_booking-delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                                    </td>
                                </tr>';
                            }
                        }
                    ?>
                    
                </tbody>
			</table>
		</div>
	</div>
    <script type="application/javascript">
        function tableSearch(){
            let input, filter, table, tr, td, txtValue;


            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            console.log(tr);

            for(let i = 0; i < tr.length; i ++) {
                td = tr[i].getElementsByTagName("td")[0];
                if(td){
                    txtValue = td.textContent || td.innerText;
                    if(txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
   
</body>
</html>