<?php

    include('include/config.php');
    session_start();

    if(!isset($_SESSION['user_name'])){
        header('location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Booking</title>

    <link rel="shortcut icon" type="image/png" href="images/Logo-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

</head>
    
<body class="background-img">

    <header class="">
            <a href="user_home.php" class="logo"><img src="images/Logo-text.png" style="width:140px;"alt=""></a>
            <ul>
                <li><a href="user_home.php">Home</a></li>
                <li><a href="user_about.php">About</a></li>
                <li><a href="user_booking.php">Booking</a></li>
                <li><a href="user_blog.php">Blog</a></li>
                <li><a href="user_contact.php">Contact</a></li>
                <a href="logout.php" class="btn">Log out</a>
            </ul>
    </header>
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>

    <?php  
        $id = $_GET['id'];
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
        $genreArray = explode("/", $genre);
        $today = date("Y-m-d");

        $name = $_SESSION['user_name'];
        $sqlUser = "SELECT * FROM user WHERE name = '$name'";
        $userResult = mysqli_query($conn, $sqlUser);

        $rowUser = mysqli_fetch_assoc($userResult);
        $email = $rowUser['email'];


    echo    '<div class="movie-container-book">
            
            <div class="card-img mr-3" style="width: 18rem;">
                <img class="card-img-top" src="images/'.$cover.'" alt="Card image cap">
            </div>

            <div class="card" style="width: 60%; height: auto; margin-left: 30px;">
                <div class="card-body">
                        <h1>'.$title.' | Ticket Reservation'.'</h1>
                        <p>Genre:';
                        foreach($genreArray as $genres){
                            echo $genres.' ';
                        }

    echo                '|  Duration: '.$duration.' hours</p>
                        <hr style="background:#8d8d8d5c;">

                        <form action="send-email-transaction.php?title='.$title.'" method="post" onsubmit="return submitForm(this);">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="contact">Contact #</label>
                                    <input required type="tel" class="form-control" id="phone" name="phone" placeholder="1234-567-8911" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Address</label>
                                    <input required type="text" class="form-control" id="inputAddress" autocomplete="off" placeholder="1234 Main St" name="address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input readonly="true" type="email" class="form-control" id="email" value="'.$email.'" name="email";>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="date">Date</label>
                                    <input required type="date" class="form-control" id="date" autocomplete="off" max="'.$end.'" min="'.$today.'" value="'.$today.'" name="date";>
                                </div>
                                <div class="form-group col-md-4 ml-2">
                                    <label for="time">Time</label><br>
                                    <select required id="time" name="time" class="dark-select-time form-select-lg mt-1">
                                        <option selected>Select show time</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="1:30 PM">1:30 PM</option>
                                        <option value="4:00 PM">4:00 PM</option>
                                        <option value="8:00 PM">8:00 PM</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                        <label for="price">Ticket Price</label>
                                        <input readonly="true" type="number" class="form-control" id="price" value="'.$price.'" name="price";>
                                </div>
                                <div class="form-group col-md-2 ml-2">
                                        <label for="price">Quantity</label>
                                        <input required min="1" onchange="calculateAmount('.$price.')" id="quantity" type="number" class="form-control col-md-10" id="price" value="1" max="99" name="quantity";>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price">Add-ons</label>
                                    <select required name="addOn" id="addOnsSelect" onChange="calculateAmount('.$price.')" class="text-center dark-select form-select-lg" aria-label="Default select example">
                                        <option selected value="0">Select Addons menu</option>
                                        <option value="160">Large Popcorn + Large Drink</option>
                                        <option value="155">Large Popcorn + Medium Drink</option>
                                        <option value="150">Large Popcorn + Small Drink</option>
                                        <option value="145">Medium Popcorn + Large Drink</option>
                                        <option value="140">Medium Popcorn + Medium Drink</option>
                                        <option value="135">Medium Popcorn + Small Drink</option>
                                        <option value="130">Small Popcorn + Large Drink</option>
                                        <option value="125">Small Popcorn + Medium Drink</option>
                                        <option value="120">Small Popcorn + Small Drink</option>

                                    </select>
                                </div>
                                    <div class="form-group col-md-2 mt-2 ml-3">
                                        <button type="submit" name="buy" class="form-control btn btn-danger mt-4">Order Ticket</button>
                                    </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>';
    ?>

    <script>
        function calculateAmount(price) {
            
            var addOnPrice = document.getElementById('addOnsSelect');
            var addOn = parseInt(addOnPrice.options[addOnPrice.selectedIndex].value, 10);

            console.log("Add On Price: " + addOn);
            
            var quantity = document.getElementById('quantity');
            console.log("Quantity: " + quantity.value);
            
            var total_price = (price * quantity.value) + addOn;
            console.log("price: " + total_price);

            var divobj = document.getElementById('price');
            divobj.value = total_price;
        }

        function submitForm(form){
            swal({
                title: "Are you sure?",
                text: "This form will be submitted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then(function (isOkay) {
            if (isOkay) {
                form.submit();
            }
            });
            return false;
        }
</script>
    </script>
    
</body>
</html>