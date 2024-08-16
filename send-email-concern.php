<?php

    use PHPMailer\PHPMailer\PHPMailer;

    include('include/config.php');
    session_start();

    if(!isset($_SESSION['user_name'])){
        header('location:index.php');
    }

    function sendmail(){

        $nameUser = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];

        $name = "Tick.It - Movie Ticket"; 
        $to = $email; 
        $subject = "Concern Question";
        $body = "<font size='3'> Dear ".$nameUser.", 
        <br><br>Thank you for getting in touch and I am sorry to hear you are experiencing issues.
        <br><br>Your concern is (".$content.")
        <br><br>We will email you once we find answer to your concern.
        <br><br>Please let me know if you have any follow-up questions or concerns and we would be more than happy to assist.
        <br><br>Take care and stay safe!
        <br><br> Regards,
        <br><br><b>-Tick.It</b> - <i>'Click it or Tick it'</i>
        </font>";
        $from = "movietick.it@gmail.com"; 
        $password = "movietickitbooking123";  

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
            header("Location:user_contact.php?alert=success");
        } else {
            header("Location:user_contact.php?alert=error");
        }
    }


        // sendmail();  // call this function when you want to

    if(isset($_POST)){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];

        $sql = "INSERT INTO concern (name, email, content) VALUES('$name','$email','$content')";
        $result = mysqli_query($conn,$sql);

        sendmail();



   }
?>