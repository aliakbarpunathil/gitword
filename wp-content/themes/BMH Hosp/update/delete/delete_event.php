<?php
require( '../../../../wp-load.php' );
global $wpdb;
$rows_affected=$wpdb->delete( 'wp_posts', array( 'ID' => $_GET['id'])); 
$wpdb->delete( 'wp_contact', array( 'event_id' => $_GET['id'])); 
$eventCount=$wpdb->get_var( "SELECT COUNT(*) FROM wp_event_register WHERE event_id = '".$_GET['id']."'"); 
if($eventCount >0 )
	$rows_affected1=$wpdb->delete( 'wp_event_register', array( 'event_id' => $_GET['id'])); 

if($eventCount >0 ){
	if($rows_affected && rows_affected1)	
		$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/content.php' );
	else
		$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/content.php' );
	}
 else{
	if($rows_affected)
		$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/content.php' );
	else
		$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/content.php' );
}
wp_redirect( $redirect );
?>