<?php

    use PHPMailer\PHPMailer\PHPMailer;

    include('include/config.php');
    session_start();

    if(!isset($_SESSION['user_name'])){
        header('location:index.php');
    }

    function sendmail($reference){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $addOnValue = $_POST['addOn'];
        $title = $_GET['title'];

        switch($addOnValue){
            case 160:
                $addon= "Large Popcorn + Large Drink";
                break;
            case 155:
                $addon= "Large Popcorn + Medium Drink";
                break;
            case 150:
                $addon= "Large Popcorn + Small Drink";
                break;
            case 145:
                $addon= "Medium Popcorn + Large Drink";
                break;
            case 140:
                $addon= "Medium Popcorn + Medium Drink";
                break;
            case 135:
                $addon= "Medium Popcorn + Small Drink";
                break;
            case 130:
                $addon= "Small Popcorn + Large Drink";
                break;
            case 125:
                $addon= "Small Popcorn + Medium Drink";
                break;
            case 120:
                $addon= "Small Popcorn + Small Drink";
                break;
            case 0:
                $addon= "No Add-ons";
                break;
            
        }

        $name = "Tick.It - Movie Ticket";  // Name of your website or yours
        $to = $email;  // mail of reciever
        $subject = "Ticket Reciept";
        $body = "<font size='3'>Dear ".$firstName.",
        <br><br>Thank you for buying a ticket! Here are the information:
        <br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Movie Title:</b> <i>".$title ."</i>
        <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of Ticket:</b> ".$quantity." Tickets
        <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Addons:</b> ".$addon.". 
        <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Price:</b> ₱".$price.".00 
        <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Schedule date:</b> ".$date." - ". $time."
        <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:</b> ".$address." 
        <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone Number:</b> ".$phone." 
        <br><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reference Number:</b> ".$reference."
        <br><br><br>Regards,
        <br><br><b>-Tick.It</b> - <i>'Click it or Tick it'</i></font>";  
        $from = "movietick.it@gmail.com";  // you mail
        $password = "movietickitbooking123";  // your mail password

        // Ignore from here

        require_once ("PHPMailer/PHPMailer.php");
        require_once ("PHPMailer/SMTP.php");
        require_once ("PHPMailer/Exception.php");
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            header("Location:user_booking.php?alert=success");
        } else {
            header("Location:user_booking.php?alert=error");
        }
    }


        // sendmail();  // call this function when you want to


    if(isset($_POST)){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $fullName = $firstName." ".$lastName;
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $addOnValue = $_POST['addOn'];
        $title = $_GET['title'];
        $reference = uniqid("TI-", TRUE);

        switch($addOnValue){
            case 160:
                $addon= "Large Popcorn + Large Drink";
                break;
            case 155:
                $addon= "Large Popcorn + Medium Drink";
                break;
            case 150:
                $addon= "Large Popcorn + Small Drink";
                break;
            case 145:
                $addon= "Medium Popcorn + Large Drink";
                break;
            case 140:
                $addon= "Medium Popcorn + Medium Drink";
                break;
            case 135:
                $addon= "Medium Popcorn + Small Drink";
                break;
            case 130:
                $addon= "Small Popcorn + Large Drink";
                break;
            case 125:
                $addon= "Small Popcorn + Medium Drink";
                break;
            case 120:
                $addon= "Small Popcorn + Small Drink";
                break;
            case 0:
                $addon= "No Add-ons";
                break;
            
        }
        $sql = "INSERT INTO transaction (title, referenceId, first_name, last_name, full_name, phone_number, address, email, schedule_date, schedule_time, ticket_quantity, addons, total_price) VALUES('$title','$reference' ,'$firstName','$lastName','$fullName','$phone','$address','$email','$date','$time','$quantity','$addon','$price')";
        $result = mysqli_query($conn,$sql);
        sendmail($reference);



    }
?>