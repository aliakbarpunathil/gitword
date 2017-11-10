<?php
require( '../../../../wp-load.php' );
global $wpdb;

	$rows_affected=$wpdb->delete( 'wp_discussion_comments', array( 'id' => $_GET['id'])); 

	if($rows_affected)
		$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/discussion-single.php?discussionId='.$_GET['discussionId'] );
	else
		$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/discussion-single.php?discussionId='.$_GET['discussionId'] );
	
	wp_redirect($redirect);



?>