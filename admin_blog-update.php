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

</head>
<body>  

    <?php
        $id = $_GET['updateid'];
        $getsql = "SELECT * FROM blog WHERE id = '$id'";
        $selectResult = mysqli_query($conn, $getsql);

        $row = mysqli_fetch_assoc($selectResult);

        $id = $row["id"];
        $title = $row["title"];
        $author = $row["author"];                    
        $content = $row["content"];
        $category = $row['Category'];
        $date = $row['published_date'];
        $category = strtolower($category);
        $category = ucfirst($category);
    ?>

    <div class="container">
        <form method="POST" action="">
            <h4 class="display-4 text-center">Update Blog</h4><hr><br>
            
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" value="<?php echo htmlspecialchars($title); ?>" name="blogTitle" class="form-control" placeholder="Blog title" required>
            </div>
            
            <div class="mb-3">
                <label>Author</label>
                <input type="text" value="<?php echo htmlspecialchars($author); ?>" name="blogAuthor" class="form-control" placeholder="Author of blog" required>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <input type="text" value="<?php echo htmlspecialchars($category); ?>" name="blogCategory" class="form-control" placeholder="Category of blog" required>
            </div>
            <div class="mb-3">
                <label>Publish Date</label>
                <input readOnly="true" value="<?php echo htmlspecialchars($date); ?>"type="date" name="publish_date" value="<?php echo htmlspecialchars($today); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Content</label><br>
                <textarea rows ="5"cols="89" name="content" style="border:solid 1px black;" ><?php echo htmlspecialchars($content); ?> </textarea><br>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary ">Update </button>
        </form>
    </div>


</body>
        
<?php  
if(isset($_POST['submit'])){
            
        $title = $_POST['blogTitle'];
        $author = $_POST['blogAuthor'];
        $category = $_POST['blogCategory'];
        $date = $_POST['publish_date'];
        $content = $_POST['content'];
        $category = strtolower($category);
        $category = ucfirst($category);
                            
        $sql = "UPDATE blog SET title = '$title', content = '$content', author = '$author' , Category = '$category', published_date = '$date' WHERE id = '$id'";
                            
        $result = mysqli_query($conn,$sql);
            
        
       if ($result) {
            header("Location:admin_blog.php?success=Successfully Updated");
        }
        else {
            header("Location:admin_blog-update.php?id=$id&error=Unknown error occurred");
        }
    }
?>

</html>