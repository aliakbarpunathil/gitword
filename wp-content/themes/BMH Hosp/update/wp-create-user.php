<?php
require( '../../../wp-load.php' );
include( dirname( __FILE__ ) .'/cmcmail.php' );
global $wpdb;
$user_email = $_POST['email'];
$username = $_POST['uname'];
$name = $_POST['first_name'];

if($_POST['createuser'] == 'Add New User'){
$password = $_POST['pass1'];
if(get_current_user_id()==1){
$role=$_POST['role'];
}
else{
$role="subscriber";
}

$userdata = array(
    'user_login'  =>  $username,
    'user_email'  =>  $user_email,
    'user_pass'   =>  $password,
    'role'   	  =>  $role
	
);
$user_id=wp_insert_user( $userdata );
if($user_id){
	$user2=$wpdb->insert( 
	'wp_profile_photo', 
	array( 
		'uname' => $username,
		'name' => $name,
		'pro_image' => get_home_url().'/wp-content/uploads/userphoto/avatar.jpg'
	)
	);
$subject="CMC Batch27 Account Created";
$body = "Welcome ".$username.",\n\n\t Your Account is Successfully created.\n\nUser Name : ".$username."\nPassword :".$password."\n\n Regards \n-Admin";
cmcMailer($user_email, $subject, $body);
}
}
elseif($_POST['createuser'] == 'Update User'){
$uid=$wpdb->get_var("SELECT id from wp_users WHERE user_login='".$username."'");
$user_id = wp_update_user( array( 'ID' => $uid, 'user_email' => $user_email ) );
if(!is_wp_error($user_id)){
if($user_id){
	$user2=$wpdb->update( 
	'wp_profile_photo', 
	array( 
		'name' => $name	
	),
	array( 
		'uname' => $_POST['uname']
		)
	);
}
}
}
if($user2)
	$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/doctors-list-view.php' );
else
	$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/doctors-list-view.php' );
wp_redirect( $redirect );
?>