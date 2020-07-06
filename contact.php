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
            $body = file_get_contents('email.html');

            $form_name = $_POST['name']; //get name from form
            $form_email = $_POST['email']; //get email address from form
            $form_subject = $_POST['subject']; //get subject from form
            $form_message = $_POST['message']; //get message from form

            $body = str_replace('%name%', $form_name, $body); //replace template details
            $body = str_replace('%email%', $form_email, $body); //replace template details
            $body = str_replace('%subject%', $form_subject, $body); //replace template details
            $body = str_replace('%details%', $form_message, $body); //replace template details
        ?>
    </head>
    <body>
        
	<?php
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0; // set to 3 for verbose debug output
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->Port = 25;
        $mail->SMTPSecure = 'none';
        $mail->SMTPAuth = false;
		$mail->SMTPAutoTLS = false;
        $mail->ENCRYPTION = 'none';  //this is essential
        $mail->setFrom('noreply@holisticwellbeing.com.au', 'Holistic Wellbeing Webpage Enquiry'); //email from
        $mail->AddAddress($form_email);    //email to
        $mail->AddBCC('holistic_lee@hotmail.com');  //blind copy
        $mail->AddReplyTo($form_email);
        $mail->CharSet = 'utf-8';
        $mail->Subject = 'Holistic Wellbeing Webpage Equiry'; //email Subject
		$mail->MsgHTML($body); //send email confirmation from template
        $mail->isHTML(true); //is email HTML

        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
            echo $msg;
        } else {
			header("Location: thankyou.html");exit;
        }      
    ?>      
    </body>
</html>