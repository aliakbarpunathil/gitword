<?php
require( '../../../wp-load.php' );
include( dirname( __FILE__ ) .'/cmcmail.php' );
global $wpdb;
$user_email = $_GET['email'];
$id = $_GET['id'];
$subject = "password changed";
$body = "Hello User, \n Your password is changed. please enter your email address as your password.";
wp_set_password( $user_email, $id );
wp_mail( $user_email, $subject, $body );
wp_redirect(wp_get_referer());
?>