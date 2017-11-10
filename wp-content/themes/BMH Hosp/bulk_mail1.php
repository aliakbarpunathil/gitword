<?php
require( '../../../wp-load.php' );
include( dirname( __FILE__ ) .'/cmcmail.php' );
global $wpdb;
 $users = $wpdb->get_results('SELECT user_login, user_email from wp_users');
 foreach($users as $user)
 {
	$username = $user->user_login;
	$user_email = $user->user_email;
	$subject="CMC Batch27 Account Created";

	$user_data = get_user_by('login', $username);
	$key = get_password_reset_key( $user_data );


	$body = "Welcome ".$username.",\n\n\t Your Account is Successfully created.\n\nUser Name : ".$username."\nPlease Click the Following Link to Set your password\n\n".network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($username), 'login');

	$stats = cmcMailer( $user_email, $subject, $body );
	if($stats)
		echo "Success for ".$username;
	else
		echo "failure for". $username;
	
 
 }

?>