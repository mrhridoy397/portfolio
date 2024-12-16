<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit']))
{

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true; 

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through                                 
    $mail->Username   = 'mrhridoy397@gmail.com';                     //SMTP username
    $mail->Password   = 'iwtmdwrxkormuhvn';                               //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mrhridoy397@gmail.com', 'mahmudur rahman');
    $mail->addAddress('mrhridoy397@gmail.com', 'mahmudur rahman');     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contact Form';
    $mail->Body    = '<h3>Hello, you got a new enquiry</h3>

        <h4>name: '.$name.'</h4>
        <h4>email: '.$email.'</h4>
        <h4>subject: '.$subject.'</h4>
        <h4>message: '.$message.'</h4>



    ';
    if($mail->send())
    {   
        $_SESSION['status'] = " Thanks you contact us";
        header("location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }
    else{

        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
else{
    header('location: index.php');
    exit(0);
}


?>