<?php
require( '../../../wp-load.php' );

global $wpdb;
if($wpdb->get_var("SELECT post_id FROM wp_hpage_event WHERE page = 'home'" ) != null)
	$token=$wpdb->update('wp_hpage_event', array(
	'post_id' => $_GET['postId']
	),
	array(
	'page' => 'home'
	));	
else
	$token=$wpdb->insert('wp_hpage_event', array(
	'post_id' => $_GET['postId'],
	'page' => 'home'
	));

if($token)
	$redirect = add_query_arg( 'register', 'success', get_home_url() );
else
	$redirect = add_query_arg( 'register', 'fail', get_home_url() );
wp_redirect( $redirect );
?>