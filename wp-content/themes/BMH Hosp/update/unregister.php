<?php
require( '../../../wp-load.php' );

global $wpdb;

$token=$wpdb->delete( 'wp_event_register', array( 'event_id' => $_GET['pid'], 'user_id' => $wpdb->get_var("SELECT id from wp_users where user_login='".$_GET['uname']."'"))); 
if($token)
$redirect = add_query_arg( 'unregister', 'success', get_template_directory_uri().'/event-description.php?p='.$_GET['pid']);
else
$redirect = add_query_arg( 'unregister', 'failed', get_template_directory_uri().'/event-description.php?p='.$_GET['pid'] );

wp_redirect( $redirect );
?>