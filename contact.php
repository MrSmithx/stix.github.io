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
            $to_email = $_SESSION['email'];  //email address of the person logged in
        ?>
    </head>
    <body>
        
	<?php
        // echo "Holistic Wellbeing Enquiry Submission<br>";
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0; // set to 3 for verbose debug output
        $mail->isSMTP();
        $mail->Host = "localhost";
        $mail->Port = 25;
        $mail->SMTPSecure = "none";
        $mail->SMTPAuth = false;
		$mail->SMTPAutoTLS = false;
        $mail->ENCRYPTION = "none";  //this is essential
        $mail->setFrom('enquiry@holisticwellbeing.com.au', 'Holistic Wellbeing Webpage Enquiry'); //email from
        $mail->AddAddress('holistic_lee@hotmail.com');   //email to
        $mail->CharSet = 'utf-8';
        $mail->Subject = "Holistic Wellbeing Webpage Equiry"; //email Subject
		$mail->isHTML(false); //is email HTML
		
		$name = $_POST['name']; //get name from form
		$email = $_POST['email']; //get email address from form
		$subject = $_POST['subject']; //get subject from form
		$details = $_POST['message']; //get message from form
		
		$mail->Body = "Hi Lee, \n\n You have a new Holistic Wellbeing Equiry from: \n\n Name : ".$name." \n Email : ".$email." \n\n Subject : ".$subject." \n Message : ".$details.""; //email body with details from form

        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
            echo $msg;
        } else {
			header("Location: thankyou.html");exit;
            //$msg .= "Thank you for your Enquiry, I will be in touch soon. <br><br>Please wait to be returned to The Holstic Wellbeing HomePage.";
			//header("Refresh:5; url=index.html");
            //echo $msg;
        }      
    ?>      
    </body>
</html>