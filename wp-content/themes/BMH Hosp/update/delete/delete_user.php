<?php
require( '../../../../wp-load.php' );
global $wpdb;

$rows_affected=$wpdb->delete( 'wp_profile_photo', array( 'uname' => $_GET['uname'])); 
$rows_affected2=$wpdb->delete( 'wp_event_register', array( 'user_id' => $wpdb->get_var("SELECT id from wp_users where user_login='".$_GET['uname']."'"))); 
$rows_affected1=$wpdb->delete( 'wp_users', array( 'user_login' => $_GET['uname'])); 

 if(($rows_affected > 0) && ($rows_affected1 > 0))
$redirect = add_query_arg( 'delete', 'success', get_template_directory_uri().'/doctors-list-view.php' );
else
$redirect = add_query_arg( 'delete', 'fail', get_template_directory_uri().'/doctors-list-view.php' );
wp_redirect( $redirect );
?>
