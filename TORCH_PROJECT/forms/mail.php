<?php
// use PHPMailer\PHPMailer\PHPMailer;

//    require_once'phpmailer/Exception.php';
//    require_once'phpmailer/PHPMailer.php';
//    require_once'phpmailer/SMTP.php';

   ini_set("sendmail_from", '$email'); 
   $to = "james.adupa@gmail.com";
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];  
   $message = $_POST['message'];  
   $header = "From:'$to'\r\n";  
  
   $result = mail ($to,$subject,$message,$header);  
  
   if( $result == true ){  
      echo "Message sent successfully...";  
   }else{  
      echo "Sorry, unable to send mail...";  
   } 


?>
