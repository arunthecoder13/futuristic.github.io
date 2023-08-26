<?php

     
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
           
use 'phpmailer/src/Exception.php';
use 'phpmailer/src/PHPMailer.php';
use 'phpmailer/src/SMTP.php';
                   

   
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $comment = $_POST['message'];

        
        // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);

        try {
        // Server settings
        ///$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'futuristiccontact6@gmail.com'; // YOUR gmail email
        $mail->Password = 'osdqgwaztupjkfxe'; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom('futuristiccontact6@gmail.com', 'Contact');
        $mail->addAddress('futuristiccontact6@gmail.com', 'ADMIN');
   

        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = "Contact";
   

            $mail->Body ="<html><body>
            <table rules='all' style='border-color: #fff; width: 100%;' cellpadding='10'>
                       
            <tr><td style='width: 12%;'><strong>Name:</strong> </td><td>".$name. "</td></tr>
            <tr><td><strong>Email:</strong> </td><td>".$email."</td></tr>
            <tr><td><strong>Subject:</strong> </td><td>".$subject."</td></tr>
            <tr><td><strong>Comment:</strong> </td><td>".$comment."</td></tr>
            
                       
            </table>
            </body></html>
            " ;
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

                $mail->send();
                echo "<script LANGUAGE='JavaScript'>
                window.alert('Message Successfully Sent! Thank You!');
                window.location.href='index.html';
                </script>";
                         
                }
                    catch (Exception $e) {
                        $errorMessage = $e->getMessage(); // Get the exception message
                        echo "<script LANGUAGE='JavaScript'>
                            window.alert('Error: $errorMessage');
                            window.location.href='index.html';
                            </script>";
                    }

?>