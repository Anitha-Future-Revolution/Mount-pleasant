<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

//get the post data 
$strSubject="Mount Pleasant Enquire Form";
$message = "";

if(isset($_POST['submit']))

{

    // Get data from form 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
    extract($_POST); 
    
    

    $message =  "<table width='100%' border='1' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td width='10%' colspan='4' bgcolor='#E4315A' style='padding:15px; color: #fff; font-weight:bold;'>
                        Mount Pleasant Enquiry Details    </td>
                    </tr>
                    <tr>
                        <td style='padding:5px;font-weight:bold;'>Name </td>
                        <td style='padding:5px;'>".$name."</td>
                    </tr>
                    <tr>
                        <td style='padding:5px;font-weight:bold;'>Email </td>
                        <td style='padding:5px;'>".$email."</td>
                    </tr>
                    <tr>
                        <td style='padding:5px;font-weight:bold;'>Phone number </td>
                        <td style='padding:5px;'>".$phone."</td>
                    </tr>
                    
                </table>";
                
}

try {
 //Server settings
 //$mail->SMTPDebug = 2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'ssl://smtp.gmail.com'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = TRUE; // Enable SMTP authentication
 $mail->Username = 'rohithbabu.furecs@gmail.com'; // SMTP username
 $mail->Password = 'esdzlsfqyccydlzi'; // SMTP password
 $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 465; // TCP port to connect to

//Recipients
 $mail->setFrom('mailtofurecs@gmail.com', 'Mount Pleasant Enquiry Details');
 $mail->addAddress('mailtofurecs@gmail.com'); // Add a recipient
// $mail->addAddress('recipient2@example.com'); // Name is optional
 $mail->addReplyTo('mailtofurecs@gmail.com', 'Mount Pleasant Enquiry Details');

$mail->addBCC('anitha.furecs@gmail.com');

// Attachments
// $mail->addAttachment('/home/cpanelusername/attachment.txt'); // Add attachments
// $mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg'); // Optional name

// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = $strSubject;
 $mail->Body = $message;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo "<script>

        window.location='thank-you.php';exit();</script>";
//  echo 'Message has been sent';
 
} catch (Exception $e) {
    echo "<script>

        window.location='thank-you.php';exit();</script>";
//  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
