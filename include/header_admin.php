    <header class="header-admin">
        <a href="admin_booking.php" class='logo'><img src="images/Logo-text.png" style="width:140px; margin-top:px"alt=""></a>
        <ul>
            <li><a href="admin_booking.php">Booking</a></li>
            <li><a href="admin_blog.php">Blog</a></li>
            <a href="logout.php" class="btn">Log out</a>
        </ul>
    </header>
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
