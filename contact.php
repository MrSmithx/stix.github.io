<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
            use PHPMailer\PHPMailer\SMTP;
            require 'mail/Exception.php';  //my phpmailer scripts are in a 'mail' subdirectory
            require 'mail/PHPMailer.php';
            require 'mail/SMTP.php';
            $to_email = $_SESSION['email'];  //email address of the person logged in, set elsewhere
        ?>
    </head>
    <body>
        
	<?php
        echo "Holistic Wellbeing Enquiry Submission<br>";
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0; // set to 3 for verbose debug output
        $mail->isSMTP();
        $mail->Host = "localhost";  //specific to my cPanel
        $mail->Port = 25;
        $mail->SMTPSecure = "none";
        $mail->SMTPAuth = false;
		$mail->SMTPAutoTLS = false;
        $mail->ENCRYPTION = "none";  //this is essential
        $mail->setFrom('enquiry@holisticwellbeing.com.au', 'Holistic Wellbeing Webpage Enquiry');
        $mail->AddAddress('holistic_lee@hotmail.com');   //I set this elsewhere. you can put in a static value for testing.
        $mail->CharSet = 'utf-8';
        $mail->Subject = "Holistic Wellbeing Webpage Equiry";
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$mail->Body = "Hi Lee, \n\n You have a new Holistic Wellbeing Equiry from: \n\n Name : ".$name." \n Email : ".$email." \n\n Subject : ".$subject." \n Message : ".$message."";

        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
            echo $msg;
        } else {
            $msg .= "Thank you for your Enquiry, I will be in touch soon. <br><br>Please wait to be returned to The Holstic Wellbeing HomePage.";
			header("Refresh:5; url=index.html");
            echo $msg;
        }      
    ?>      
    </body>
</html>