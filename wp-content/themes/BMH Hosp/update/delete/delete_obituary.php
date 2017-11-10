<?php
require( '../../../../wp-load.php' );
global $wpdb;
$rows_affected=$wpdb->delete( 'wp_obituary', array( 'ID' => $_POST['obituary_id'])); 
 if($rows_affected)
$redirect = add_query_arg( 'register', 'success', get_template_directory_uri().'/obituary.php' );
else
$redirect = add_query_arg( 'register', 'fail', get_template_directory_uri().'/obituary.php' );
wp_redirect( $redirect );
?>