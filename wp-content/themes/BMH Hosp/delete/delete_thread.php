<?php
require( '../../../../wp-load.php' );
global $wpdb;
$rows_affected=$wpdb->delete( 'wp_discussion', array( 'id' => $_GET['discussionId'])); 
if($rows_affected)
	$rows_affected1=$wpdb->delete( 'wp_discussion_comments', array( 'discussion_id' => $_GET['discussionId'])); 

	if($rows_affected1)
		$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/discussion-thread.php' );
	else
		$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/discussion-thread.php' );

wp_redirect($redirect);



?>