<?php
require( '../../../wp-load.php' );
include( dirname( __FILE__ ) .'/cmcmail.php' );
$user_email = "cmcbatch.two.seven@gmail.com";
$subject = "Contact : ".$_POST['your-subject'];
$body = $_POST['your-message'].",\n\n\t -".$_POST['your-name'].",\n\n\t -".$_POST['your-email'] ;
$user2=cmcMailer($user_email, $subject, $body);


if($user2)
	$redirect = add_query_arg( 'register', 'success', wp_get_referer() );
else
	$redirect = add_query_arg( 'register', 'fail', wp_get_referer() );
wp_redirect( $redirect );

?>