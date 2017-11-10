<?php
require( dirname(__FILE__) .'/../../../wp-load.php' );
require_once ABSPATH . WPINC . '/class-phpmailer.php';
require_once ABSPATH . WPINC . '/class-smtp.php';
/*
$to = "ali@ontash.net";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: admin@gmail.com" . "\r\n" .
"CC: babeesh@ontash.net";

$success= mail($to,$subject,$txt,$headers);
if($success)
echo "success";
else
echo "fail"; */
function cmcMailer($to, $subject, $body) { 
	$mail = new PHPMailer();  // create a new object
	$from = 'admin@cmcbatch27.com';  
	$from_name = 'CMC Batch 27 Administrator'; 
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'box302.bluehost.com';
	$mail->Port = 465; 
	$mail->Username = 'admin@cmcbatch27.com';  
	$mail->Password = 'cmcAdmin!12';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
	}
?>