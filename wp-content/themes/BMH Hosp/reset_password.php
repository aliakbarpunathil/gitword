<?php
require( '../../../wp-load.php' );
include( dirname( __FILE__ ) .'/cmcmail.php' );
global $wpdb;
$users = $wpdb->get_results("SELECT id,user_email FROM wp_users ");
$subject = "password changed";
$body = "Hello User, \n Your password is changed. please enter your email address as your password.";

foreach($users as $user){
$user_email=$user->user_email;
wp_set_password( $user_email, $user->id );
cmcMailer( $user_email, $subject, $body );
}
wp_redirect(wp_get_referer());
?>