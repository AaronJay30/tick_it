    
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
