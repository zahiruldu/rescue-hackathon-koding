<?php

require_once('app/functions.php');

require_once('vendor/autoload.php');

$to = $rescuee = $subject="";




function sendRescueEmail($to,$rescuee,$subject){
	$to = $to;
	$rescuee =$rescuee;
	$subject = $subject;
   
   $mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'rescueapp1@gmail.com';                 // SMTP username
	$mail->Password = 'R1111111111';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('zahirul.arb@gmail.com', 'Rescue App | Hackathon - 2016');
	$mail->addAddress($to, 'Rescue Request');     // Add a recipient
	$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('zahirul.arb@gmail.com', 'Developer');
	$mail->addCC('zahirul.arb@gmail.com');
	// $mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Rescue Your Friend | Hack.Summit';
	$mail->Body    = 'Hello Dear,<br>. Your friend has requested you to rescue him/her. He is in '.$subject .' Get his/her detail by ID : '.$rescuee.'<br>Thanks,<br>Rescue App. ';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$sendmail = $mail->send();

      return $sendmail;

}










