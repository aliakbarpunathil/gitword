	<?php
require( dirname(__FILE__) .'/../../../wp-load.php' );
require_once ABSPATH . WPINC . '/class-phpmailer.php';
require_once ABSPATH . WPINC . '/class-smtp.php';
/*
$to = "ali@ontash.net";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: admin@cmcbatch27.com" . "\r\n" .
"CC: ali@ontash.net";

cmcMailer($to, $subject, $txt) ;

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
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = 'cmcbatch.two.seven@gmail.com';  
	$mail->Password = 'cmcadmin123';           
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