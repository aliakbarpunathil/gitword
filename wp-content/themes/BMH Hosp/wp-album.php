<?php
require( '../../../wp-load.php' );

global $wpdb;

$token=$wpdb->insert('wp_albums', array(
    'album_name' => $_POST['album_name']
));


if($token)
	$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/album-view.php' );
else
	$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/album-view.php' );

	wp_redirect( $redirect );
?>