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
    <title>Admin | Blog</title>

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

</head>
<body class="background-img-booking">
    <?php include('include/header_admin.php'); ?>
    
    
    <div class="container">
		<div class="box">
        <div class="blog-heading" style="margin-bottom: 2%;">
                <span></span><h3>BLOG</h3>
            </div>
            
			<?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
		    <?php } ?>

            <div class="link-right">
                <input type="text" id="myInput" onkeyup="tableSearch()" placeholder="Search blog title" class="form-control" style="height:45px;">

                <button class="btn btn-secondary"><a href="admin_blog-add.php" class="link-primary text-light">Add Blog</a></button> <br>
			</div>
			<table class="table table-striped text-center" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Image</th>
                    <th scope="col">Content</th>
                    <th scope="col">Category</th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Operation</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM blog ORDER BY category";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row["id"];
                                $title = $row["title"];
                                $author = $row["author"];
                                $image = $row["image"];
                                $content = $row["content"];
                                $category = $row["Category"];
                                $date = $row["published_date"];

                                echo '<tr>
                                    <th scope="row">'.$id.'</th>
                                    <td style="width: 200px;">'.$title.'</td>
                                    <td style="width: 200px;">'.$author.'</td>
                                    <td class="image-poster" style="width: 250px;"><img src=images/'."$image".' class="poster-blog"></td>
                                    <td style="width: 300px;">'.$content.'</td>
                                    <td style="width: 150px;">'.$category.'</td>
                                    <td class="date">'.$date.'</td>
                                    <td class="operation"> 
                                        <button class="btn btn-primary"><a href="admin_blog-update.php?updateid= '.$id.'" class="text-light">Update</a></button>
                                        <button class="btn btn-danger"><a href="admin_blog-delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
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