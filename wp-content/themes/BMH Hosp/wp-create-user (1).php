<?php
require( '../../../wp-load.php' );
include ( dirname( __FILE__ ).'/cmcmail.php' );
global $wpdb;
$user_email = $_POST['email'];
$username = $_POST['uname'];
$name = $_POST['first_name'];


if($_POST['createuser'] == 'Add New User'){
if(username_exists( $username)) {
			
		$redirect = add_query_arg( 'register', 'duplicate', get_template_directory_uri().'/user-new1.php' );
		wp_redirect( $redirect );
}
elseif(email_exists($user_email)){
		
		$redirect = add_query_arg( 'register', 'duplicate', get_template_directory_uri().'/user-new1.php' );
		wp_redirect( $redirect );
}

else {
$password = $_POST['pass1'];
if(get_current_user_id()==1){
$role=$_POST['role'];
}
else{
$role="subscriber";
}
$username = $_POST['user_login'];
$userdata = array(
    'user_login'  =>  $username,
    'user_email'  =>  $user_email,
    'user_pass'   =>  $password,
    'role'   	  =>  $role
	
);
$user_id=wp_insert_user( $userdata );
if($user_id>0){
	$user2=$wpdb->insert( 
	'wp_profile_photo', 
	array( 
		'uname' => $username,
		'name' => $name,
		'pro_image' => get_home_url().'/wp-content/uploads/userphoto/avatar.jpg'
	)
	);
	
		$subject="CMC Batch27 Account Created";
		
		
		$user_data = get_user_by('login', $username);
		$key = get_password_reset_key( $user_data );
		
		
		$body = "Welcome ".$username.",\n\n\t Your Account is Successfully created.\n\nUser Name : ".$username."\nPlease Click the Following Link to Set your password\n\n<".network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($username), 'login').">\r\n";
		
		cmcMailer( $user_email, $subject, $body );


}
}
}
elseif($_POST['createuser'] == 'Update User'){
$uid=$wpdb->get_var("SELECT id from wp_users WHERE user_login='".$username."'");
$user_id = wp_update_user( array( 'ID' => $uid, 'user_email' => $user_email, 'role' => $_POST['role'] ) );

if(!is_wp_error($user_id)){

	$user2=$wpdb->update( 
	'wp_profile_photo', 
	array( 
		'name' => $name	
	),
	array( 
		'uname' => $username
		)
	);

}
}

if($user2)
	$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/doctors-list-view.php' );
else
	$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/doctors-list-view.php' );
wp_redirect( $redirect );

?>