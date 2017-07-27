<?php
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$messages = $_POST['messages'];

$message='
    '.$messages.'
';
    require "phpmailer/class.phpmailer.php"; //include phpmailer class

    // Instantiate Class
    $mail = new PHPMailer();

    // Set up SMTP
    $mail->IsSMTP();                // Sets up a SMTP connection
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection
    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
    $mail->Port = 465;  //Gmail SMTP port
    $mail->Encoding = '7bit';

    // Authentication
    $mail->Username   = ""; // Your full Gmail address
    $mail->Password   = ""; // Your Gmail password

    // Compose
    $mail->SetFrom($email, $name, $phone);
    $mail->AddReplyTo($email, $name);
    $mail->Subject = "Apotek Contact Care : $subject";      // Subject (which isn't required)
    $mail->MsgHTML($message);

    // Send To
    $mail->AddAddress("rakha.rvp@gmail.com", "Rakha Viantoni P"); // Where to send it - Recipient
    		// Send!
    if (!$result = $mail->Send())
    {
      echo "Error: $result->ErrorInfo";
    }
    else
    {
      echo "Message Sent!";
      header("refresh:5;contact.php");
    }
	// $message = $result ? 'Successfully Sent!' : 'Sending Failed!';
	unset($mail);

}
?>
